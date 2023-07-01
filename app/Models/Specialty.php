<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialty extends Model
{
    const PATH="images/specialties/";
    use HasFactory;
    protected $fillable = [ 'name','image' ];
}
