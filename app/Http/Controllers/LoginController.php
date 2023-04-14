<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{   function index(){
    return view('admin.login');
}
   function loginStore(Request $request){
       // dd($request->all());
       if(auth()->guard('web')->attempt(['email'=>$request->email,'password'=>$request->password])){
           //dd($request->all());
           return redirect()->route('dashboard');
       }
       else {
           return redirect()->back('admin.login');
       }
       }

       function logout(){

       Auth::logout();
           return redirect()->route('admin.login');
       }

}
