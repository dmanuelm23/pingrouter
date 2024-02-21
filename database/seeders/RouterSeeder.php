<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class RouterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('routers')->truncate();
        Schema::enableForeignKeyConstraints();
        DB::table('routers')->insert([
            ['identificador'=>'R01','ip'=>'142.251.218.142','hostname'=>'Router-1', 'name'=>'Router-1', 'created_at' => date('Y-m-d H:i:s')],
            ['identificador'=>'R02','ip'=>'157.240.19.35','hostname'=>'Router-2', 'name'=>'Router-2', 'created_at' => date('Y-m-d H:i:s')],
            ['identificador'=>'R03','ip'=>'192.178.57.46','hostname'=>'Router-3', 'name'=>'Router-3', 'created_at' => date('Y-m-d H:i:s')],
            ['identificador'=>'R04','ip'=>'157.240.19.174','hostname'=>'Router-4', 'name'=>'Router-4', 'created_at' => date('Y-m-d H:i:s')],
            ['identificador'=>'R05','ip'=>'104.244.42.129','hostname'=>'Router-5', 'name'=>'Router-5', 'created_at' => date('Y-m-d H:i:s')],
            ['identificador'=>'R06','ip'=>'140.82.114.3','hostname'=>'Router-6', 'name'=>'Router-6', 'created_at' => date('Y-m-d H:i:s')],
            ['identificador'=>'R07','ip'=>'172.65.251.78','hostname'=>'Router-7', 'name'=>'Router-7', 'created_at' => date('Y-m-d H:i:s')],
            ['identificador'=>'R08','ip'=>'204.79.197.212','hostname'=>'Router-8', 'name'=>'Router-8', 'created_at' => date('Y-m-d H:i:s')],
            ['identificador'=>'R09','ip'=>'66.225.237.224','hostname'=>'Router-9', 'name'=>'Router-9', 'created_at' => date('Y-m-d H:i:s')],
            ['identificador'=>'R010','ip'=>'192.168.1.100','hostname'=>'Router-10', 'name'=>'Router-10', 'created_at' => date('Y-m-d H:i:s')],
            ['identificador'=>'R011','ip'=>'192.168.1.101','hostname'=>'Router-11', 'name'=>'Router-11', 'created_at' => date('Y-m-d H:i:s')],
            ['identificador'=>'R012','ip'=>'192.168.1.102','hostname'=>'Router-12', 'name'=>'Router-12', 'created_at' => date('Y-m-d H:i:s')],
            ['identificador'=>'R013','ip'=>'192.168.1.103','hostname'=>'Router-13', 'name'=>'Router-13', 'created_at' => date('Y-m-d H:i:s')],
            ['identificador'=>'R014','ip'=>'192.168.1.104','hostname'=>'Router-14', 'name'=>'Router-14', 'created_at' => date('Y-m-d H:i:s')],
            ['identificador'=>'R015','ip'=>'192.168.1.105','hostname'=>'Router-15', 'name'=>'Router-15', 'created_at' => date('Y-m-d H:i:s')],
            ['identificador'=>'R016','ip'=>'192.168.1.106','hostname'=>'Router-16', 'name'=>'Router-16', 'created_at' => date('Y-m-d H:i:s')],
            ['identificador'=>'R017','ip'=>'192.168.1.107','hostname'=>'Router-17', 'name'=>'Router-17', 'created_at' => date('Y-m-d H:i:s')],
            ['identificador'=>'R018','ip'=>'192.168.1.108','hostname'=>'Router-18', 'name'=>'Router-18', 'created_at' => date('Y-m-d H:i:s')],
            ['identificador'=>'R019','ip'=>'192.168.1.109','hostname'=>'Router-19', 'name'=>'Router-19', 'created_at' => date('Y-m-d H:i:s')],
            ['identificador'=>'R020','ip'=>'192.168.1.110','hostname'=>'Router-20', 'name'=>'Router-20', 'created_at' => date('Y-m-d H:i:s')],
            ['identificador'=>'R021','ip'=>'192.168.1.111','hostname'=>'Router-21', 'name'=>'Router-21', 'created_at' => date('Y-m-d H:i:s')],
            ['identificador'=>'R022','ip'=>'192.168.1.112','hostname'=>'Router-22', 'name'=>'Router-22', 'created_at' => date('Y-m-d H:i:s')],
            ['identificador'=>'R023','ip'=>'192.168.1.113','hostname'=>'Router-23', 'name'=>'Router-23', 'created_at' => date('Y-m-d H:i:s')],
            ['identificador'=>'R024','ip'=>'192.168.1.114','hostname'=>'Router-24', 'name'=>'Router-24', 'created_at' => date('Y-m-d H:i:s')],
            ['identificador'=>'R025','ip'=>'192.168.1.115','hostname'=>'Router-25', 'name'=>'Router-25', 'created_at' => date('Y-m-d H:i:s')]
        ]);  
    }
}
