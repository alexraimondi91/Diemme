<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class contact_showcase_table_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contact_showcase')->insert([
            'name'=>Str::random(10),
            'text'=>Str::random(100),
            'email' =>Str::random(10).'gmail.com',
            'object'=>Str::random(40),
            'info'=>Str::random(100),
            'lat'=>rand(0,1000),
            'long'=>rand(0,1000),
            'user_id'=>rand(0,10),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);
    }
}
