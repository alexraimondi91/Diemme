<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class service_group_table_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1; $i<= 3; $i++)
            {
                DB::table('group_service')->insert([
                'service_id'=> rand(1,4),
                'group_id' => rand(1,4),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                ]);
            }
    }
}
