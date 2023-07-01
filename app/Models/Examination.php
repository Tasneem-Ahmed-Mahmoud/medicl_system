<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
 use App\Models\Doctor;
 use App\Models\Patients;
class Examination extends Model
{
    use HasFactory;
    protected $fillable = [
        'doctor_id','patient_id','description','title','status','price','offer','date','file'];

       const PATH='images/examination/';




       
        /**
         * Interact with the user's address.
         */
        protected function date(): Attribute
        {

           
                return Attribute::make(
                    set: fn (string $value) => date('y-m-d', strtotime($value))
                );
            
        }

function patient(){
    return $this->belongsTo(Patient::class);
}


function doctor(){
    return $this->belongsTo(Doctor::class);
}




    }
