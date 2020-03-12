<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class quotation_showcase_table_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('quotation_showcase')->insert([
            'name'=> Str::random(10),
            'description'=>Str::random(100),
            'user_id'=>rand(1,10)
        ]);
    }
}
