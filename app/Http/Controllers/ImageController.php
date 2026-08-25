<?php

namespace App\Http\Controllers;

use App\Interfaces\ImageStorage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ImageController extends Controller
{
    public function index(): View
    {
        return view('image.index');
    }

    public function save(Request $request): RedirectResponse
    {
        $storeInterface = app(ImageStorage::class);
        // app returns an instance of the ImageLocalStorage object
        $storeInterface->store($request);

        // that object has the store function, which saves the image info
        return back();
    }
}
