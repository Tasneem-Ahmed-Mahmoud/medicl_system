<?php

namespace App\Models;
use App\Models\User;
use App\Models\Specialty;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [ 'user_id','description','specialty_id'];
    function user(){
        return $this->belongsTo(User::class);
    }


    function specialty(){
        return $this->belongsTo(Specialty::class);
    }
}
