<?php

namespace App\Models;


use Illuminate\Http\Request;

use Intervention\Image\Drivers\Gd\Driver;
use App\Http\Controllers\UserController;
use Intervention\Image\ImageManager;

class Picture
{
    public function cutPhoto($id, Request $request): \Illuminate\Http\RedirectResponse
    {
        if ($request->file('file')) {
            $file = $request->file;
            $filename = $file->getClientOriginalName();
            $manager = new ImageManager(new Driver());
            $image = $manager->read($request->file('file'));
            $image = $image->resize(400, 400);
            $image->toJpeg(80)->save(base_path('storage/app/public/news/' . $filename));
            UserController::editPhoto($id,$filename);



        }

        return back();
    }
}
