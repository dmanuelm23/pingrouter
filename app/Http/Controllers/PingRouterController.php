<?php

namespace App\Http\Controllers;

use App\Models\Router;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PingRouterController extends Controller
{
    public function findIpPing($ip)
    {
        $iteracion = Cache::get('iteracion');
        $router = Router::where('ip', $ip)->first();
        $result = array();
        if ($iteracion>=1)
        {
            for ($i=1; $i <= $iteracion; $i++) { 
                array_push($result,Cache::get($i.'info-router'.$router->id));
            }
            return response()->json([
                'statusCode'=>200,
                'result'=>$result,
                'message' =>'Resultados',
            ]);
        }
        else{
            return response()->json([
                'statusCode'=>204,
                'message' =>'No hay resultados aún',
            ]);
        }
    }

    public function pingRouters()
    {
        $iteracion = Cache::get('iteracion');
        if ($iteracion>=1)
        {
            $routers = Router::get();
            $result = array();
            foreach ($routers as $router)
            {
                array_push($result,Cache::get($iteracion.'info-router'.$router->id));
            }
            return response()->json([
                'statusCode'=>200,
                'result'=>$result,
                'message' =>'Resultados',
            ]);
        }
        else{
            return response()->json([
                'statusCode'=>204,
                'message' =>'No hay resultados aún',
            ]);

        }
    }

    public function pingRouter($ip)
    {
        //Comando unicamente para SO Unix/Linux/MacOs
        $command = "ping -c 4 -s 64 -t 64 ".$ip;
        exec($command, $output, $return);
        if ($return == 0) {
            if($this->findTimeOut($output)==3)
                $result = ['latencia' => "Tiempo de espera agotado", 'paquetes' => $output[6]];
            else
                $result = ['latencia' => $output[8], 'paquetes' => $output[7]];
            return response()->json([
                'statusCode'=>200,
                'result'=> $result,
                'message' =>'Ping ejecutado satisfactoriamente',
            ]);
        }
        else
        {
            if($this->findTimeOut($output)==3)
                $result = ['latencia' => "Tiempo de espera agotado", 'paquetes' => $output[6]];
            else
                $result = ['latencia' => $output[1], 'paquetes' => $output[1]];
            return response()->json([
                'statusCode'=>200,
                'result'=> $result,
                'message' =>'Ping no ejecutado satisfactoriamente- Verifique Router',
            ]);
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
