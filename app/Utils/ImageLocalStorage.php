<?php

namespace App\Utils;

use App\Interfaces\ImageStorage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageLocalStorage implements ImageStorage
{
    public function store(Request $request): void
    {
        if ($request->hasFile('profile_image')) {
            // validates if request sends somth in the profileimage variable
            // if there is info, it gets stored in local disk (shows in the web page the info stored)
            // the file with the details of the image
            Storage::disk('public')->put(
                'test.png',
                file_get_contents($request->file('profile_image')->getRealPath())
            );
        }
    }
}
