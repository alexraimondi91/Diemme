<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Faker\Generator as Faker;


class news_showcase_table_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i<10; $i++){
            DB::table('news_showcase')->insert([
                'name'=>Str::random(10),
                'path'=>"/storage/img/news_showcase/1.jpg",
                'description'=>$faker->text(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'user_id'=>rand(1,9)
            ]);
        }
    }
}
