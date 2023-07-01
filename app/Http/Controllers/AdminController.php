<?php

namespace App\Http\Controllers;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\AdminRequest;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $admins=Admin::with('user:id,type,name,email,image,phone')->paginate(5);
    //    dd($admins);

       return view("admin.admins.index",compact("admins"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
     return view("admin.admins.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminRequest $request)
    {
        $user=User::create([
           'name'=>$request->name,
           'password'=> Hash::make($request->password),
           'email'=>$request->email,
           'type'=>'admin',
           'phone'=>$request->phone
        ]);
        $user_id=User::latest()->first()->id;
        if($user){
            Admin::create([
                'user_id'=>$user->id
            ]);
            Alert::toast('admin created successfully','success');
        }else{
            Alert::toast('failed','error'); 
        }
        return redirect()->route('admins.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        $admin->load('user');
        // dd($admin);
        return view('admins.edit',compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminRequest $request, Admin $admin)
    {
        //     dd($admin);
    //      dd($request->all());
       $admin= User::find($admin->user_id)->update([
        'name'=>$request->name,
        'email'=>$request->email,
        'phone'=>$request->phone
        ]);
        if($admin){
          
            Alert::toast('admin updated successfully','success');
        }else{
            Alert::toast('failed','error'); 
        }
        // dd($admin);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
