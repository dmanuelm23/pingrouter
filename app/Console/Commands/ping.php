<?php

namespace App\Console\Commands;

use App\Models\Router;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;

class ping extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ping:routers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Comando para verificar ping a los routers';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if(Cache::has('iteracion')){
            $iteracion = Cache::get('iteracion')+1;
            Cache::put('iteracion', $iteracion,86400);
        }
        else{
            $iteracion=1;
            Cache::put('iteracion',$iteracion,86400);
        }
        $routers = Router::get();
        foreach ($routers as $router)
        {
            //Comando unicamente para SO Unix/Linux/MacOs
            $command = "ping -c 4 -s 64 -t 64 ".$router->ip;
            exec($command, $output, $return);
            if ($return == 0) {
                if($this->findTimeOut($output)==3)
                    $ping = ['latencia' => "Tiempo de espera agotado", 'paquetes' => $output[6]];
                else
                    $ping = ['latencia' => $output[8], 'paquetes' => $output[7]];
                $result = [
                    'iteracion' => $iteracion,
                    'id'=>$router->id, 
                    'ip'=>$router->ip, 
                    'ping' => $ping,
                    'statusCode'=>200,
                    'message' =>'Ping ejecutado satisfactoriamente',
                    'created_at' => date('Y-m-d H:i:s')
                ];
            }
            else
            {
                if($this->findTimeOut($output)==3)
                    $ping = ['latencia' => "Tiempo de espera agotado", 'paquetes' => $output[6]];
                else
                    $ping = ['latencia' => $output[1], 'paquetes' => $output[6]];
                $result = [
                        'iteracion' => $iteracion,
                        'id'=>$router->id,
                        'ip'=>$router->ip, 
                        'ping' => $ping,
                        'statusCode'=>200,
                        'message' =>'Ping no ejecutado satisfactoriamente- Verifique Router',
                        'created_at' => date('Y-m-d H:i:s')
                    ];
            }
            Cache::put($iteracion.'info-router'.$router->id, $result,86400);
        }
    }

    public function findTimeOut($output){
        $i=0;
        $cont=0;
        $phrase = "timeout";
        foreach ($output as $value) {
            if(strpos($value, $phrase)){
                $cont++;
            }
            $i++;
        }
        return $cont;
    }
}
