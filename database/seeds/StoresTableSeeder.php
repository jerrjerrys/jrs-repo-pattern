<?php
/**
 * Created by PhpStorm.
 * User: JERRYS
 * Date: 4/18/2015
 * Time: 8:54 AM
 */

use Illuminate\Database\Seeder;

class StoresTableSeeder extends Seeder{
    public function run() {
        DB::table('stores')->delete();

        DB::table('stores')->insert([
            'user_id' => '1',
            'store_name' => 'JRS Flash Disk Store',
            'status' => 'not-active'
        ]);

        DB::table('stores')->insert([
            'user_id' => '1',
            'store_name' => 'JRS Software Store',
            'status' => 'not-active'
        ]);
    }
}