<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Faker\Generator as Faker;

class layout_table_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        //
        DB::table('layout')->insert([
            'name'=> Str::random(10),
            'final'=> 0,
            'name_file'=> Str::random(10),
            'path'=> '/storage/img/layout/1.jpg',
            'description'=> $faker->text(),
            'user_id'=> rand(1,9),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);
    }
}
