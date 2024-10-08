<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use App\Models\Contact;

class ContactsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

     public function index(){
        $id = Auth::user()->id;
        $contacts = Contact::where('user_id', $id)->get();

        return view('pages.contacts.index', compact('contacts'));
     }

     public function edit($id){
        $contact = Contact::where('id', $id)->first();
        return view('pages.contacts.form', compact('contact'));
     }

     public function form(){
        return view('pages.contacts.form');
     }

     public function update(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
       ]);

       if ($validator->fails()) {
            return redirect()
              ->back()
              ->withErrors($validator)
              ->withInput();
       }

        $contact = Contact::findOrFail($id);
        $contact->name = $request->input('name');
        $contact->email = $request->input('email');
        $contact->company = $request->input('company');
        $contact->phone = $request->input('phone');
        $contact->save();

        return redirect('/contacts');
     }
     

     public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
       ]);

       if ($validator->fails()) {
            return redirect()
              ->back()
              ->withErrors($validator)
              ->withInput();
       }

        $id = Auth::user()->id;
       
        $contact = new Contact();
        $contact->user_id = $id;
        $contact->name = $request->input('name');
        $contact->email = $request->input('email');
        $contact->company = $request->input('company');
        $contact->phone = $request->input('phone');
        $contact->save();

        return redirect('/contacts');
     }

     public function search(Request $request){
        $id = Auth::user()->id;
        $keyword = $request->input('keyword');
        if($keyword){
            $contacts = Contact::where('user_id', $id)
                ->where(function ($query) use ($keyword) {
                $query->where('name', 'like', "%{$keyword}%")
                    ->orWhere('company', 'like', "%{$keyword}%")
                    ->orWhere('email', 'like', "%{$keyword}%")
                    ->orWhere('phone', 'like', "%{$keyword}%");
                })
                ->get();
        }else{
            $contacts = Contact::where('user_id', $id)->get();
        }
        
        if($contacts){
            return response()->json(['contacts' => $contacts]);
        }else{
            return response()->json(['contacts' => '']);
        }
        
     }

    public function destroy($id)
    {
        $customer = Contact::findOrFail($id);
        $customer->delete();
        return redirect('/contacts');
    }
}