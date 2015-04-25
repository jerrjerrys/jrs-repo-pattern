<?php

use Illuminate\Database\Seeder;

/**
 * Created by PhpStorm.
 * User: JERRYS
 * Date: 4/18/2015
 * Time: 8:13 AM
 */

class UsersTableSeeder extends Seeder{
    public function run() {
        DB::table('users')->delete();

        DB::table('users')->insert([
            'name' => 'jerrys',
            'email' => 'abipradjajerrystama@gmail.com',
            'password' => bcrypt('hahaha'),
            'image' => 'hahaha',
            'status' => 'not-active'
        ]);
    }
}