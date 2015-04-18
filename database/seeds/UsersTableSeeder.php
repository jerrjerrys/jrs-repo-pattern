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
            'image' => 'http://www.google.co.id/imgres?imgurl=http://www.playbillvault.com/images/photo/B/i/thumbs/w208/Billie-Joe-Armstrong.jpg&imgrefurl=http://www.playbillvault.com/Person/Detail/5692/Billie-Joe-Armstrong&h=269&w=208&tbnid=MZz1uuoyeqtVvM:&zoom=1&docid=Q7cXI52ctUB9SM&ei=WbAxVaSfONGRuATCz4CIAQ&tbm=isch&ved=0CCMQMygDMAM',
            'status' => 'not-active'
        ]);
    }
}