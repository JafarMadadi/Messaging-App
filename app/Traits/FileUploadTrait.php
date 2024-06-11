<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

trait FileUploadTrait {

    function uploadFile(Request $request, string $inputName, ?string $oldPath = null, string $path = '/uploads' ) {
        if($request->hasFile($inputName)) {
            $file = $request->{$inputName};
            $ext = $file->getClientOriginalExtension();
            $fileName = 'img_'.uniqid().'.'.$ext;

            $file->move(public_path($path), $fileName);

            return $path.'/'.$fileName;
        }

        return null;
    }
}
