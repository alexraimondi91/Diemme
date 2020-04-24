<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        foreach(Auth::user()->serviceHave() as $item)
        switch($item['name']){
            case 'privilege_dashboard': 
                return view('backoffice/dashboard/dashboardPrivilege');
            case 'client_dashboard': 
                return view('backoffice/dashboard/dashboardClient');
            default: 
                return view('backoffice/dashboard/dashboard');
        }
    }

    // public function show_auth(Group $group){
    //     //$group_id =  ;
    //     //return $group->find(Auth::user()->group_id)->services()->get();
    //     return Auth::user()->serviceHave();
    // }

}
