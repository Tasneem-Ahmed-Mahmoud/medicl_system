<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;
use App\Traits\FileTrait;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Patient;

class Patient_ProfileController  extends Controller
{

    use FileTrait;

    function edit_profile()
    {
        return view('frontend.patient.edit_profile');
    }
    function dashboard()
    {
        return view('frontend.patient.dashboard');
    }


    public function edit(Request $request)
    {
    }




    public function update(ProfileUpdateRequest $request)
    {
    }


    /**
     * Delete the user's account.
     */
    public function destroy(Request $request)
    {
    }



    public function reset_password(Request $request)
    {



        // dd($request);
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);
        $curr_password = $request->old_password;
        $new_password = $request->password;


        if (!Hash::check($curr_password, Auth::guard('patient')->user()->password)) {
            Alert::error('Error ', 'incorrect password');
        } else {
            $request->user()->fill(['password' => Hash::make($new_password)])->save();
            Alert::success('Success', 'password change successfully');
            return redirect()->back();
        }
    }
    function update_image(Request $request, Patient $patient)
    {


        $request->validate([
            'image' => 'nullable|mimes:jpeg,png,jpg'
        ]);

        $old_image = $patient->image;
        $new_image = $this->uploadFile($request->image, $patient::PATH, $old_image);
        $patient = $patient->update([
            'image' => $new_image
        ]);

        if ($patient) {
            Alert::success('Success', 'image change successfully');
        } else {

            Alert::error('Error ', 'faild');
        }
        return redirect()->back();
    }





    
}
