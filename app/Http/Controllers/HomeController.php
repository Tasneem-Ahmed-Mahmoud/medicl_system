<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Doctor;
class HomeController extends Controller
{


    function index(){
        $doctors=Doctor::with(['specialty:name,id','user:name,image,id'])->limit(4)->get(['user_id','specialty_id','description']);
        // dd($doctors);
       $settings=Setting::pluck('value','key');
        return view('frontend.index',compact('settings','doctors'));
    }
}
