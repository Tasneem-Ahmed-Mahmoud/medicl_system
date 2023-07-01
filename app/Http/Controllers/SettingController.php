<?php

namespace App\Http\Controllers;
use App\Http\Requests\SettingRequest;
use App\Models\Setting;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $settings=Setting::paginate(5,['id','key','value']);
        return view('admin.settings.index',compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.settings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SettingRequest $request)
    {
        // dd($request->all());
        $setting=Setting::create([
            'key'=>$request->key,
            'value'=>$request->value
        ]);
        if($setting){
            
            Alert::toast('setting created successfully','success');
        }else{
            Alert::toast('failed','error'); 
        }
        return redirect()->route('settings.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Setting $setting)
    {
        return view('admin.settings.edit',compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SettingRequest $request, Setting $setting)
    {
        $setting=$setting->update([
            'key'=>$request->key,
            'value'=>$request->value
        ]);
        if($setting){
            
            Alert::toast('setting updated successfully','success');
        }else{
            Alert::toast('failed','error'); 
        }
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Setting $setting)
    {
    
        $setting= $setting->delete();
        if($setting){
 
         Alert::toast('setting deleted successfully','success');
     }else{
         Alert::toast('failed','error'); 
     }
     return redirect()->back();
    }
}
