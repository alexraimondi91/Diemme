<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

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
            role_table_Seeder::class,
            group_table_Seeder::class,
            users_table_Seeder::class,
            layout_table_Seeder::class,
            product_showcase_table_Seeder::class,
            tecnology_showcase_table_Seeder::class,
            quotation_showcase_table_Seeder::class,
            contact_showcase_table_Seeder::class,
            news_showcase_table_Seeder::class,
            user_chat_table_Seeder::class,
            chat_table_Seeder::class,
            attachment_chat_table_Seeder::class,
            
        ]);
    }
}
