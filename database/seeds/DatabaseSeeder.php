<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         
         $this->call([
            users_table_Seeder::class,
            groupTableSeeder::class,
            roleTableSeeder::class,
        ]);
    }
}
