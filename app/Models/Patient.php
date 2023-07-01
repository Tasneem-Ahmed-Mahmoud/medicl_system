<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
class Patient extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    const PATH="images/patients/";
    use HasFactory;
    protected $guard='patient';
    protected $fillable = [
        'name','birthday','age','notes','address','password','phone','image','email'
        
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];



 static  function validation(){
return [ 'name'=>'required|min:3|max:20',
'notes'=>'nullable|min:3|max:100',
'address'=>'nullable|min:3|max:100',
'birthday'=>'required|date',

'image'=>'nullable|mimes:jpeg,png,jpg'
];
   }
       
    
    // function setBirthdayAttribute(){
    //     $this->birthday=date('y-m-d', strtotime($this->birthday));
    //   }

    //   function setAgeAttribute(){
    //     $currentYear = date('Y'); // Current Year
    //      $birthYear = date('Y', strtotime($this->birthday)); 

    //     $this->age=$currentYear - $birthYear;
    //   }
    // function getBirthdayAttribute($value){
       
    //   return  date('m/d/y', strtotime($value));
    
    // }
}
