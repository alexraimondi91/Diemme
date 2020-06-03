<?php

namespace App\Http\Controllers;

use App\models\Chat;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Chat  $Chat
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Chat $chat)
    {
        try
        {$request->validate(["message" => "nullable|string", "attachment" => "file|mimes:png,jpeg,jpg,pdf"]);
        $chat = $chat->find((int) $request->id);
        if ($chat->id) {
            if ($request->attachment) {
                $dir = 'public/chatAttachment/';
                $file_name = time() . date('Y-m-d-h-i-s') . '.' . $request->attachment->getClientOriginalExtension();
                if ($request->attachment->storeAs($dir, Auth::user()->id . $file_name)) {
                    $path = '/storage/chatAttachment/' . Auth::user()->id . $file_name;
                    $chat->users()->attach(Auth::user()->id, ["body" => $request->message,"path"=>$path]);
                }
            }
            else $chat->users()->attach(Auth::user()->id, ["body" => $request->message]);
        }
        return redirect(route("chatView", 'id' . '=' . $chat->id));}
        catch(Exception $e){
            abort(404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Chat  $Chat
     * @return \Illuminate\Http\Response
     */
    public function show(Chat $chat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function edit(Chat $chat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chat $chat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chat $chat)
    {
        //
    }
}
