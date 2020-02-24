<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class group_table_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('group')->insert([
            'name' => Str::random(10),
            'role_id' => Str::random(10),
            'created_at' => Carbon::now()
        ]);
    }
}
