<?php
namespace App\Helpers;

class HelperMethod
{
    public function uploadfile($file,$filepath){
        $filename = time().'.'.$file->extension();  
        $location = public_path($filepath);
        $file->move($location, $filename);
        return $filepath.$filename;
    }
}