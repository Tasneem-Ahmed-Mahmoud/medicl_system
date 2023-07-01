<?php

namespace App\Http\Controllers;
use App\Traits\FileTrait;
use App\Http\Requests\ExaminationRequest;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Examination;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Traits\DateTrait;
class ExaminationController extends Controller
{
    use FileTrait,DateTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $examinations=Examination::with(['doctor:id,user_id','patient:id,name'])->paginate(5,['description','patient_id','doctor_id','id','file','price','offer','status','title']);
        // dd($doctors);
        return view('admin.examinations.index',compact('examinations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $doctors=Doctor::with(['user:id,name'])->get(['user_id','id']);
        // dd($doctors);
        return view('admin.examinations.create',compact('doctors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ExaminationRequest $request)
    {
        // dd($request->all());
        $date=date('y-m-d', strtotime($request->date));
        // dd($date);
$file=$this->uploadFile($request->file,Examination::PATH);
        $examination=Examination::create([
             'patient_id'=>$request->patient_id,
             'doctor_id'=>$request->doctor_id,
             'date'=>$date,
             'title'=>$request->title,
             'description'=>$request->description,
             'file'=>$file,
             'price'=>$request->price,
             'offer'=>$request->offer
        ]);
        //

        if($examination){
            
            Alert::toast('examination created successfully','success');
        }else{
            Alert::toast('failed','error'); 
        }
        return redirect()->route('examinations.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Examination $examination)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Examination $examination)
    {
    
        return view('admin.examinations.edit',compact('examination'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Examination $examination)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Examination $examination)
    {
        $file=$examination->file;
        // dd($file);
        $examination= $examination->delete();
        if($examination){
 $this->delete_file($file,$examination::PATH);
         Alert::toast('examination deleted successfully','success');
     }else{
         Alert::toast('failed','error'); 
     }
     return redirect()->back();
    }





    
function show_file(Examination $examination){
    // dd($examination->file);
    $path=public_path($examination::PATH.$examination->file);
    if( file_exists($path) ) {
        return response()->file($path);
                }else{
                    back();
                }

}



function download_file(Examination $examination){
    $path=public_path($examination::PATH.$examination->file);
    if( file_exists($path) ) {
        return response()->download($path);
                }else{
                    back();
                }
   }
  
   
}
