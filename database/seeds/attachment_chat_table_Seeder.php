<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class attachment_chat_table_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('attachment_chat')->insert([
            'path' => 'Storage/img/attachment_chat/1.jpg',
            'name' => Str::random(10),
            'chat_id' => rand(1, 10),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
