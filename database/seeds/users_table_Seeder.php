<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class users_table_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('users')->insert([
            'name' => Str::random(10),
            'surname' => Str::random(10),
            'email' => Str::random(10).'gmail.com',
            'email_verified_at ' => Carbon::now(),
            'password' => Hash::make('password'),
            'country' => Str::random(16),
            'fiscalCode' => Str::random(16),
            'address' => Str::random(16),
            'insertDate' => Carbon::now(),
            'group_id' => rand(1,2),
            'active' => 1,
            'remember_token ' => Str::random(16)
        ]);

    }
}
