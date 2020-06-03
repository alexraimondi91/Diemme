<?php

namespace App\Http\Controllers;

use App\models\auth\Group;
use App\models\Chat;
use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Chat $chats,Group $group)
    {
        try
        {
        $chats = Auth::user()->chats()->first();
        if ($chats)
         {
            //  $chats = $chats->paginate(5);
             $users =  $chats->users()
             ->with('group')
             ->where('body','=','START')
             ->where('id','!=',Auth::user()->id)
             ->paginate(5);
             $chats = $chats->get();
             return view('backoffice.chatDashboard.manage',['collection'=>$users,'chats'=>$chats]);
            }
        return view('backoffice.chatDashboard.manage',['collection'=>$chats]);}
        catch(Exception $e){
            abort(404);
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function show(Chat $chat,Request $request)
    {
        try{
        $i = $request->id;
        $message = $chat->find($i)->users()->orderBy('pivot_created_at','desc')->get();
        return $message;}
        catch(Exception $e){
            abort(404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Chat  $chat
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function view(Request $request)
    {
        try{$id = $request->id;
        return view('backoffice.chatDashboard.chat',['item'=>$id]);}
        catch(Exception $e){
            abort(404);
        }
    }

    /**
     * Create the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function createWithService7(Request $request, User $user)
    {
        //
        try
        {$users = $user->forService()
        ->where('service.id','=',7)
        ->where('active','=','1')
        ->get();
        return view('backoffice.chatDashboard.start',['users'=>$users]);}
        catch(Exception $e){
            abort(404);
        }
    }
    /**
     * Create the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function createWithService13(Request $request, User $user)
    {
        //
        try{
        $users = $user->forService()
        ->where('service.id','=',13)
        ->where('active','=','1')
        ->get();
        return view('backoffice.chatDashboard.start',['users'=>$users]);
        }
        catch(Exception $e){
            abort(404);
        }
    }

      /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function store(Chat $chat,Request $request)
    {
        try
        {$request->validate(['subject'=>'required|string|max:255']);
        $chat->subject = $request->subject;
        $chat->save();
        $chat->users()->attach([Auth::user()->id,$request->id_user], ['body' => 'START']);
        return redirect(route("chatView", 'id' . '=' . $chat->id));}
        catch(Exception $e){
            abort(404);
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chat $chat,Request $request)
    {
        try
       {//$this->authorize('destroy',$chat);
        $request->validate(['id'=>'required|integer']);
        $chat = $chat->find($request->id);
        $chat->users()->detach();
        $chat->delete();
        return redirect(route('chatIndex'));}
        catch(Exception $e){
            abort(404);
        }
    }
}
