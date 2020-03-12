<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;


class users_table_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1; $i<=10;$i++)
        {
            DB::table('users')->insert([
            'id'=>$i,
            'name' => Str::random(10),
            'surname' => Str::random(10),
            'email' => Str::random(10).'gmail.com',
            'password' => Hash::make('password'),
            'country' => Str::random(16),
            'fiscalCode' => Str::random(16),
            'address' => Str::random(16),
            'email_verified_at' => Carbon::now(),
            'insertDate' => Carbon::now(),
            'group_id' => rand(1,3),
            'active' => 1
        ]);
        }
        

    }
}
