<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //


    function login_form(){
        return view('frontend.patient.auth.login');
    }

    // function login(Request $request){
    //         dd($request);
    //         $check=$request->all();
    //         if(Auth::guard('patient')->attempt(['email'=>$request->email,'password'-=>$request->password])){

    //         }



            function login(Request $request){
                // dd($request);
           $request->validate([
            "email"=> "required|email",
           "password"=>"required"
              ]);
        
        $credentials=$request->only("email","password");
        if(Auth::guard('patient')->attempt($credentials)){
            
            return redirect()->route('patient.dashboard');
           
        }
        // $this-> hundleLogout();
        
          return redirect()->back()->withErrors(["error"=>'invalid credential']);
        }
            
        
        
        
            function hundleLogout(){
                Auth::guard('patient')->logout();
                session()->flush();
                session()->regenerate();
            }
        
        
        
            function logout(){
                $this-> hundleLogout();
                return redirect()->route("patient.login");
            }
   



}
