<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class AuthController extends Controller
{
     public function index(){

          return view('pages.auth.index');
     }

     public function register(){
          return view('pages.auth.register');
     }

     public function save(Request $request){
          $validator = Validator::make($request->all(), [
               'name' => 'required|string|max:255',
               'email' => 'required|email|max:255|unique:users',
               'password' => ['required', 'confirmed', Password::min(8)->mixedCase()],
          ]);

          if ($validator->fails()) {
               return redirect()
                 ->back()
                 ->withErrors($validator)
                 ->withInput();
          }


          $user = new User();
          $user->name = $request->input('name');
          $user->email = $request->input('email');
          $user->password = Hash::make($request->input('password'));
          $user->save();
          
          $credentials = [
               'email' => $request->input('email'),
               'password' => $request->input('password')
          ];

          if (Auth::attempt($credentials)) {
               $request->session()->regenerate();
     
               return redirect()->intended('/thank-you');
          }

          return back()
          ->withErrors([
          'email' => 'The provided credentials do not match our records.',
          ])
          ->onlyInput('email');
     }

     public function success(){
          return view('pages.auth.thankyou');
     }

     public function login(Request $request){
          $validator = Validator::make($request->all(), [
               'email' => 'required|email',
               'password' => 'required',
          ]);

          $credentials = [
               'email' => $request->input('email'),
               'password' => $request->input('password')
          ];
          
          if (Auth::attempt($credentials)) {
               $request->session()->regenerate();
               return redirect()->intended('/contacts');
          }
     }

     public function logout() {
          Auth::logout();
          return redirect('/');
     }
}