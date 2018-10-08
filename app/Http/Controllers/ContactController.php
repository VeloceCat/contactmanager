<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Contact;

use Illuminate\Database\Eloquent\ModelNotFoundException;

class ContactController extends Controller
{
    function edit($id) {
        try {
            $contact = Contact::findOrFail($id);   
        } catch(ModelNotFoundException $e) {
            return redirect('/')->with('error', 'Contact not found!');
        }
        
        return view("contact-edit", ['contact' => $contact]);
    }

    function add() {        
        return view("contact-add");
    }

    function store(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
        ]);

        try {
            $contact = new Contact();
            $contact->name = $request->input('name');
            $contact->email = $request->input('email');
            $contact->save();

            return redirect('/')->with('error', 'Contact was created!');
        } catch(ModelNotFoundException $e) {
            return redirect('/')->with('error', 'Contact not found!');
        }
    }

    function update(Request $request, $id) {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
        ]);

        try {
            $contact = Contact::findOrFail($id);   
            $contact->name = $request->input('name');
            $contact->email = $request->input('email');
            $contact->save();
            return redirect("/edit/{$id}")->with('error', 'Contact was updated!');
        } catch(ModelNotFoundException $e) {
            return redirect('/')->with('error', 'Contact not found!');
        }
    }

    function delete($id) {
        try {
            $contact = Contact::findOrFail($id);
            $contact->delete();

            return redirect('/')->with('error', 'Contact was deleted!');
        } catch(ModelNotFoundException $e) {
            return redirect('/')->with('error', 'Contact not found!');
        }
    }
}
