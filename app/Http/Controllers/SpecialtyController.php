<?php

namespace App\Http\Controllers;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\SpecialtyRequest ;
use App\Models\Specialty;
use Illuminate\Http\Request;
use App\Traits\FileTrait;
class SpecialtyController extends Controller
{
    use FileTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $specialties=Specialty::paginate(5,['id','name','image']);
        //    dd($specialties);
    
           return view("admin.specialties.index",compact("specialties"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.specialties.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SpecialtyRequest $request)
    {
        //
        // dd($request);
        $image =$this->uploadFile($request->image,Specialty::PATH);
        //  dd($image);
        $specialty=Specialty::create([
              'name'=>$request->name,
              'image'=>$image
        ]);

        if($specialty){
          
            Alert::toast('specialty created successfully','success');
        }else{
            Alert::toast('failed','error'); 
        }
        return redirect()->route('specialties.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Specialty $specialty)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Specialty $specialty)
    {
        return view("specialties.edit",compact('specialty'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Specialty $specialty)
    {
        // dd($request);
        $old_image=$specialty->image;
        $image =$this->uploadFile($request->image,Specialty::PATH,$old_image);
        
        $specialty=$specialty->update([
              'name'=>$request->name,
              'image'=>$image
        ]);
        if($specialty){
          
            Alert::toast('specialty updated successfully','success');
        }else{
            Alert::toast('failed','error'); 
        }
        return redirect()->back();

        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Specialty $specialty)
    {
        $specialty= $specialty->delete();
        if($specialty){
 
         Alert::toast('specialty deleted successfully','success');
     }else{
         Alert::toast('failed','error'); 
     }
     return redirect()->back();
    }
}
