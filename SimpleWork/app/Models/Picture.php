<?php

namespace App\Models;

use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use \Illuminate\Support\Str;
use App\Http\Controllers\UserController;

class Picture
{
    public function cutPhoto($id, Request $request): \Illuminate\Http\RedirectResponse
    {
        // Check if a file is uploaded
        if (!empty($request->file('file'))) {
            // Get the file extension
            $ext = $request->file('file')->getClientOriginalExtension();

            // Generate a random filename
            $randomStr = date('Ymdhis').Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;

            // Move the uploaded file to the storage directory
            $request->file('file')->move('storage/news/', $filename);

            // Call the UserController's editPhoto method to update the user's profile picture
            UserController::editPhoto($id, $filename);
        }

        // Redirect back to the previous page
        return back();
    }
}
