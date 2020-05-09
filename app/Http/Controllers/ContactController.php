<?php

namespace App\Http\Controllers;

use App\Mail\CantactMail;
use App\models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    protected $rules = [
        'name' => 'required',
        'message' => 'required',
        'email' => 'required|email|blacklist',
        'subject' => 'required'
    ];

    /**
     * Display the specified resource.
     *
     * @param  \App\models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function index(Contact $contact)
    {
        $collection = $contact::all();
        return view('frontoffice.contatti.contatti', ['collection' => $collection]);
    }
    /**
     * Send email
     * @param  
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
        if (validator($request->input(), $this->rules)->fails())
            return view('frontoffice.contatti.contatti', ['collection' => $collection]);
        $mail = new CantactMail($emailAddress, $emailMessage, $emailName, $emailSubject);
        Mail::to($emailAddress)->send($mail);
        return view('frontoffice.contatti.contatti', ['collection' => $collection, 'send' => 1]);
    }

    /**
     * Display a specified resource.
     *
     * @param  \App\models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function backofficeContact(Contact $contact)
    {
        $this->authorize('backofficeContact',$contact);
        $collection = $contact::all();
        return view('/backoffice/contactDashboard/update', ['collection' => $collection]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\models\Contact  $contact
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Contact $contact)
    {

        //$this->validate($request, $this->rulesupdate);
        
        $contact::find(1);
        $this->authorize('store',$contact);
        $contact->exists=true;
        $contact->id =1;
        $contact->name = $request->name;
        $contact->text = $request->text;
        $contact->email = $request->email;
        $contact->number = $request->number;
        $contact->region = $request->region;
        $contact->nation = $request->nation;
        $contact->street = $request->street;
        $contact->lat = $request->lat;
        $contact->long = $request->long;
        $contact->user_id = Auth::user()->id;
        $contact->save();
        $collection = $contact::all();        
        return view('/backoffice/contactDashboard/update', ['collection' => $collection]);
    }
}
