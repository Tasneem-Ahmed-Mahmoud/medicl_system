<?php

namespace App\Http\Controllers;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Specialty;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\DoctorRequest;
class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $doctors= User::with('doctors:id,description,user_id,specialty_id')->where('name','like','%t%')
        //         ->orWhere('phone','like','%t%')->get(["id",'type','name','email','image','phone']);
                       
        //   dd($doctors);
        $doctors=Doctor::with(['user:id,type,name,email,image,phone','specialty:id,name'])->paginate(5,['description','user_id','specialty_id','id']);
            // dd($doctors);
    
           return view("admin.doctors.index",compact("doctors"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
$specialties=Specialty::get(['name','id']);
        return view("admin.doctors.create",compact("specialties"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DoctorRequest $request)
    {
        $specialty_id=$request->specialty_id;
        $description=$request->description;
        $user=User::create([
            'name'=>$request->name,
            'password'=> Hash::make($request->password),
            'email'=>$request->email,
            'type'=>'doctor',
            'phone'=>$request->phone,
            
         ]);
         $user_id=User::latest()->first()->id;
         if($user){
           $doctor=  Doctor::create([
                 'user_id'=>$user->id,
                 'description'=>$description,
                 'specialty_id'=>$specialty_id
             ]);
             if($doctor){
                Alert::toast('doctor created successfully','success');
             }else{
                Alert::toast('failed','error'); 
             }
             
         }else{
             Alert::toast('failed','error'); 
         }
         return redirect()->route('doctors.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Doctor $doctor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Doctor $doctor)
    {
        $specialties=Specialty::get(['name','id']);
        $doctor->load(['user','specialty']);
        return view("admin.doctors.edit",compact('doctor','specialties'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DoctorRequest $request, Doctor $doctor)
    {
        //

        // dd($request->all());
        $specialty_id=$request->specialty_id;
        $description=$request->description;
      $user=User::find($doctor->user_id);
        $user=$user->update([
            'name'=>$request->name,
            'phone'=>$request->phone,
            'email'=>$request->email
         ]);
         

        if($user){
            $doctor=  $doctor->update([
                'description'=>$description,
                'specialty_id'=>$specialty_id
            ]);
            Alert::toast('Doctor updated successfully','success');
        }else{
            Alert::toast('failed','error'); 
        }
        // dd($admin);
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Doctor $doctor)
    {
        //
    }




    function search(Request $request){
  
        if($request->ajax())
        {
            $doctors= User::with('doctors:id,description,user_id,specialty_id')->where('name','like','%'.$request->search.'%')
                ->orWhere('phone','like','%'.$request->search.'%')->get(["id",'type','name','email','image','phone']);  

                if($request->search==''){
                    $doctors= User::with('doctors:id,description,user_id,specialty_id')
                    ->get(["id",'type','name','email','image','phone']);  
    
                }
             }
            
              return  json_encode($doctors);
        }
}
