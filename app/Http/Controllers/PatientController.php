<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Patient;
use Illuminate\Http\Request;
use App\Traits\FileTrait;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StorePatientRequest;
use App\Http\Requests\UpdatePatientRequest;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patients = Patient::paginate(5, ['name', 'phone', 'age', 'birthday', 'notes', 'address', 'id', 'image']);
        //    dd($patents);

        return view("admin.patients.index", compact("patients"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.patients.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePatientRequest  $request)
    {
        //

        $birthday = date('y-m-d', strtotime($request->birthday));
        $currentYear = date('Y'); // Current Year
        $birthYear = date('Y', strtotime($birthday));
        $age = $currentYear - $birthYear;
        // dd($age);
        // dd($request->all());
        $patient = Patient::create([
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'notes' => $request->notes,
            'address' => $request->address,
            'phone' => $request->phone,
            'birthday' => $birthday,
            'age' => $age,
            'email' => $request->email
        ]);

        if ($patient) {

            Alert::toast('patient created successfully', 'success');
        } else {
            Alert::toast('failed', 'error');
        }
        return redirect()->route('patients.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Patient $patient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patient $patient)
    {
        return view('patients.edit', compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePatientRequest $request, Patient $patient)
    {
        // dd($request->all());
        $birthday = date('y-m-d', strtotime($request->birthday));
        $currentYear = date('Y'); // Current Year
        $birthYear = date('Y', strtotime($birthday));
        $age = $currentYear - $birthYear;
        // dd($age);
        //  dd($request->all());
        $patient = $patient->update([
            'name' => $request->name,
            'notes' => $request->notes,
            'address' => $request->address,
            'phone' => $request->phone,
            'birthday' => $birthday,
            'age' => $age
        ]);

        if ($patient) {

            Alert::toast('patient updated successfully', 'success');
        } else {
            Alert::toast('failed', 'error');
        }
        return redirect()->back();
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patient $patient)
    {
        // dd($patient);
        $image = $patient->image;
        $patient = $patient->delete();
        if ($patient) {
            $this->delete_file($image, $patient::PATH);
            Alert::toast('patient deleted successfully', 'success');
        } else {
            Alert::toast('failed', 'error');
        }
        return redirect()->back();
    }

    function edit_password(Patient $patient)
    {
        return view('patients.edit_password', compact('patient'));
    }
    function update_password(Request $request, Patient $patient)
    {
        //  dd($request);
        $request->validate([
            'password' => 'required|min:8|confirmed',
        ]);

        $patient = $patient->update([
            'password' => Hash::make($request->password)
        ]);
        if ($patient) {
            Alert::toast('password change successfully', 'success');
        } else {
            Alert::toast('failed', 'error');
        }
        return redirect()->back();
    }

    function search(Request $request)
    {

        if ($request->ajax()) {
            $patients = Patient::where('name', 'like', '%' . $request->search . '%')
                ->orWhere('phone', 'like', '%' . $request->search . '%')->get(['name', 'phone', 'age', 'birthday', 'notes', 'address', 'id', 'image']);
        }
        return  json_encode($patients);
    }



    function patient_search(Request $request)
    {
        if ($request->ajax()) {
            $patients = Patient::where('name', 'like', $request->search . '%')
                ->orWhere('phone', 'like', $request->search . '%')->get(['name', 'id', 'email', 'phone'])->first();
        }
        return  json_encode($patients);
    }
}
