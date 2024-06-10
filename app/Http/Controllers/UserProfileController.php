<?php

namespace App\Http\Controllers;

use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    use FileUploadTrait;

    function update(Request $request)
    {
        $request->validate([
            'avatar' => ['nullable', 'image', 'max:1000'],
            'name' => ['required', 'string', 'max:50'],
            'user_id' => ['required', 'string', 'max:50', 'unique:users,user_name'.auth()->user()->id],
            'email' => ['required', 'email', 'max:50'],
        ]);

        $avatarPath = $this->uploadFile($request, 'avatar');

        $user = Auth::user();
        if ($avatarPath) {
            $user->avatar = $avatarPath;
        }
        $user->name = $request->name;
        $user->user_name = $request->user_id;
        $user->email = $request->email;
        $user->save();

        // ارسال پاسخ JSON با وضعیت موفقیت
        return response()->json(['success' => 'Updated Successfully'], 200);
    }
}
