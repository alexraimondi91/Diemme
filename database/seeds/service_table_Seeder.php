<?php
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class service_table_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $service = array("privilege_dashboard","showcase_news","showcase_product","showcase_quotation","showcase_technology","show_contact","design_manager","show_layout","chat_simple","orderStatus","orderStatusCustomer","sendIntoProduction","factory","customer_dashboard");
        for($i=1; $i<= count($service); $i++){
        {
            DB::table('service')->insert([
            'id'=> $i,
            'name' => $service[$i-1],
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            ]);
        }
    }
    }
}
