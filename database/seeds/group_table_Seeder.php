<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class group_table_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ruoli = array('admin', 'designer','factory');

        for($i=1; $i<= count($ruoli); $i++){   
            DB::table('group')->insert([
            'id'=> $i,
            'name' => $ruoli[$i-1],
            'role_id' => $i,
            'created_at'=> Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);
        }
    }
}

