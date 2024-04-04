<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    
        $contact = new Contact();
        $contact->nom_inspecteur = $request->name;
        $contact->objet = $request->subject;
        $contact->message = $request->message;
        if($contact->save()){
            Mail::to(Config::get('mail.from.address'))->send(new ContactMail($contact));
            return view('contact.sended');
        }
        return redirect()->back()->withErrors([
            'email' => 'Veuillez entrer une adresse email valide',
            'subject' => 'Veuillez entrer un objet',
            'message' => 'Veuillez entrer un message'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
