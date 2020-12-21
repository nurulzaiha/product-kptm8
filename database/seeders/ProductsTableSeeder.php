<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name'=> 'RRR',
            'description' => 'Ubat Migrain',
            'price'=> '89.90',
            'user_id'=> '1',
           // 'user_id'=>factory('App\User')->create()->id
        //
        ]);
        
    }
}
