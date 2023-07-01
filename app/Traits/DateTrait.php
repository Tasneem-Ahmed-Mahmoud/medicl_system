<?php

namespace App\Traits;


trait DateTrait{

private function DateFormat($date){

    return date('y-m-d', strtotime($date));
   
}



private  function get_age($date){
    $currentYear = date('Y'); // Current Year
    $birthYear = date('Y', strtotime($date)); 
    $age = $currentYear - $birthYear;
    return $age;
}
}