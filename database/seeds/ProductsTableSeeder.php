<?php
/**
 * Created by PhpStorm.
 * User: JERRYS
 * Date: 4/18/2015
 * Time: 8:59 AM
 */

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder{
    public function run() {
        DB::table('products')->delete();

        DB::table('products')->insert([
            'store_id' => '1',
            'product_name' => 'flash disk 1',
        ]);

        DB::table('products')->insert([
            'store_id' => '1',
            'product_name' => 'flash disk 2',
        ]);

        DB::table('products')->insert([
            'store_id' => '1',
            'product_name' => 'flash disk 3',
        ]);

        DB::table('products')->insert([
            'store_id' => '1',
            'product_name' => 'flash disk 4',
        ]);

        DB::table('products')->insert([
            'store_id' => '2',
            'product_name' => 'app 1',
        ]);

        DB::table('products')->insert([
            'store_id' => '2',
            'product_name' => 'app 2',
        ]);

        DB::table('products')->insert([
            'store_id' => '2',
            'product_name' => 'app 3',
        ]);
    }
}