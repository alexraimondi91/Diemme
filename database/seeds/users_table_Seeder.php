<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Faker\Generator as Faker;


class users_table_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i=1; $i<=10;$i++)
        {
            DB::table('users')->insert([
            'id'=>$i,
            'name_user' => $faker->name(),
            'surname_user' => Str::random(10),
            'email' => $faker->email(),
            'password' => Hash::make('password'),
            'country_user' => Str::random(16),
            'fiscalCode_user' => Str::random(16),
            'address_user' => $faker->address(),
            'email_verified_at' => Carbon::now(),
            'group_id' => rand(1,4),
            'active' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        }
        

    }
}
