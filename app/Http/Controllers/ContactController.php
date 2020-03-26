<?php

namespace App\Http\Controllers;

use App\Mail\CantactMail;
use App\models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  \App\models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function index(Contact $contact)
    {
        $collection = $contact::all();
        return view('frontoffice.contatti.contatti',['collection'=>$collection]);
    }
    /**
     * Send email
     *
     * @param  \App\models\Contact  $contact
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function send(Request $request, Contact $contact)
    {
        $emailName = $request->input('name');
        $emailMessage = $request->input('message');
        $emailAddress = $request->input('email');
        $emailSubject = $request->input('subject');
        $collection = $contact::all();
        $mail = new CantactMail($emailAddress,$emailMessage,$emailName,$emailSubject);
        Mail::to($emailAddress)->send($mail);
        return view('frontoffice.contatti.contatti',['collection'=>$collection,'send'=>1]);
    }
    
}