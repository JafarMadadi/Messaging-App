<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait FileUploadTrait
{
//    function uploadFile(Request $request, string $inputName, ?string $oldPath = null, ?string $path = '/uploads')
//    {
//        if ($request->hasFile($inputName)) {
//
//            $file = $request->file($inputName);
//            $fileName = 'Img_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
//
//            $file->move(public_path($path), $fileName);
//
//            return $path.'/'.$fileName;
//        }
//
//        return null;
//    }
}
