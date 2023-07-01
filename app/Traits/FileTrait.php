<?php

namespace App\Traits;

 trait FileTrait{

private function uploadFile($file,$path,$old_file=null){
    
    if($old_file !=null){
        $this->delete_file($old_file,$path);
    }
    $file_name=time().'-'.'.'.$file->getClientOriginalExtension();
    $file->move(public_path($path),$file_name);
    return $file_name;
}

private function delete_file($file,$path){
$path=public_path($path.$file);
if(file_exists($path)){
    unlink($path);
}
}




}