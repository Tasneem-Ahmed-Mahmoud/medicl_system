<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;
use App\Traits\FileTrait;
class UserController extends Controller
{
    use FileTrait;
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        // dd($user);
        $image=$user->image;
       $user= $user->delete();
       if($user){
$this->delete_file($image,$user::PATH);
        Alert::toast('user deleted successfully','success');
    }else{
        Alert::toast('failed','error'); 
    }
    return redirect()->back();
    }

    function editPassword(User $user)
    {

        return view('Auth.changePassword', compact('user'));
    }

//     function changePassword(Request $request, User $user)
//     {
// // dd($user);
//         // dd($request->all());
//         $request->validate([
//             'old_password' => 'required',
//             'password' => 'required|min:8|confirmed',
//         ]);

//         if ($user->password == (Hash::make($request->old_password))) {
//             $new_password = Hash::make($request->password);
//             $user->update([
//                 'password' => $new_password
//             ]);
//             Alert::success('Success', 'password change successfully');
//         } else {
//             Alert::error('Error ', 'incorrect password');
//         }

//         return redirect()->back();
//     }



    public function changePassword(Request $request, User $user)
    {

        $request->validate([
                        'old_password' => 'required',
                        'password' => 'required|min:8|confirmed',
                    ]);
        $curr_password = $request->old_password;
        $new_password = $request->password;
    
    
    if(!Hash::check($curr_password,$user->password)){
        Alert::error('Error ', 'incorrect password');
    }
    else{
        $request->user->fill(['password' => Hash::make($new_password)])->save;
        Alert::success('Success', 'password change successfully');
     } 
     return redirect()->back();
    }




    
function edit_password(User $user){
    return view('Auth.edit_password',compact('user'));
    }
    function update_password(Request $request,User $user){
        //  dd($request);
             $request->validate([
            'password' => 'required|min:8|confirmed',
             ]);
    
               $user=$user->update([
              'password'=> Hash::make($request->password)
               ]);
               if($user){
                Alert::toast('password change successfully','success');
                }else{
                Alert::toast('failed','error'); 
                }
                return redirect()->back();
              }
}
