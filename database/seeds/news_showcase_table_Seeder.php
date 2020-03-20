<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;


class news_showcase_table_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i<10; $i++){
            DB::table('news_showcase')->insert([
                'name_file'=> Str::random(10),
                'name'=>Str::random(10),
                'path'=>"/Storage/img/news_showcase/1.jpg",
                'description'=>Str::random(100),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'user_id'=>rand(1,9)
            ]);
        }
    }
}
