<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Faker\Generator as Faker;

class product_showcase_table_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++) {
        DB::table('product_showcase')->insert([
            'name'=>Str::random(10),
            'path'=>'Storage/img/product_showcase/1.jpg',
            'description'=>$faker->text(),
            'user_id'=>rand(1,10),
            'created_at' => Carbon::now(),
            'updated_at'=> Carbon::now()
        ]);
        }
    }
}
