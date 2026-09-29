<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserApiController extends Controller
{
    // returns the info of the user
    public function show(Request $request)
    {
        return $request->user();
    }
}
