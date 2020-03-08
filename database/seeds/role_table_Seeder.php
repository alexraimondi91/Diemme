<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;


class role_table_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ruoli = array("privilege","add_news","add_product","add_technology");
        for($i=1; $i<= count($ruoli); $i++){
        {
            DB::table('role')->insert([
            'id'=> $i,
            'name' => $ruoli[$i-1],
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            ]);
        }
    }
}
}
