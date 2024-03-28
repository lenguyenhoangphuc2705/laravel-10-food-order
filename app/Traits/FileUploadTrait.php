<?php

namespace App\Traits;

use Illuminate\Http\Request;
use File;
trait FileUploadTrait {

    function uploadImage(Request $request, $inputName, $oldPath = Null, $path = "/uploads"){
        if ($request->hasFile($inputName)) {
            
            $image = $request->{$inputName};
            $ext = $image->getClientOriginalExtension();
            $imageName = 'media_'.uniqid().'.'.$ext;

            $image->move(public_path($path), $imageName);

            //delete previous file if exits
            if($oldPath && File::exists(public_path($oldPath))){
                File::delete(public_path($oldPath));
            }

            return $path.'/'.$imageName;

        }
        return NULL;
    }
}
