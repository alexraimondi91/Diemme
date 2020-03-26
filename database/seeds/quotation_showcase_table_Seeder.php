<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class quotation_showcase_table_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        DB::table('quotation_showcase')->insert([
            'name'=> Str::random(10),
            'description'=> $faker->text(),
            'user_id'=>rand(1,10)
        ]);
    }
}
