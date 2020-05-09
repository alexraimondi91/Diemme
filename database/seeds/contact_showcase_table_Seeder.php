<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Faker\Generator as Faker;

class contact_showcase_table_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        DB::table('contact_showcase')->insert([
            'name'=>Str::random(10),
            'text'=>$faker->text(),
            'email' =>Str::random(10).'gmail.com',
            'region'=>'Abruzzo',
            'nation'=>'Italia',
            'street'=>$faker->address,
            'number'=>$faker->phoneNumber,
            'lat'=>'45',
            'long'=>'45',
            'user_id'=>rand(1,10),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);
    }
}
