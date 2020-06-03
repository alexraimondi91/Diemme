<?php

namespace App\Http\Controllers;

use App\models\Layout;
use App\User;
use Exception;
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
    public function index(Layout $layout, User $user)
    {
        try {
            foreach (Auth::user()->serviceHave() as $item)
                switch ($item['id']) {
                    case 1:
                        $collection1 = $layout->where('status', '=', 'send')->get();
                        $collection2 = $user->whereYear('created_at', '=', date('Y'))->get();
                        return view(
                            'backoffice/dashboard/dashboardPrivilege',
                            ['collection1' => $collection1, 'collection2' => $collection2]
                        );
                    case 14:
                        return view('backoffice/dashboard/dashboardClient');
                    default:
                        return view('backoffice/dashboard/dashboard');
                }
        } catch (Exception $e) {
            abort(404);
        }
    }

    // public function show_auth(Group $group){
    //     //$group_id =  ;
    //     //return $group->find(Auth::user()->group_id)->services()->get();
    //     return Auth::user()->serviceHave();
    // }

}
