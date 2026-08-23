<?php 

namespace App\Utils;

use App\Interfaces\ImageStorage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageLocalStorage implements ImageStorage
{
    public function store(Request $request): void
    {
        if ($request->hasFile('profile_image')) { // reivsa si el request manda algo en el campo de profileimage
        // si es asi, guarda en el disco publico (muestra en la pg web lo que tiene ahi)
        // el arhcivo con los contenidos de la imagen 
            Storage::disk('public')->put(
                'test.png',
                file_get_contents($request->file('profile_image')->getRealPath())
            );
        }
    }
}
