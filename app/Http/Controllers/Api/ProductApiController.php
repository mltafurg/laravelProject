<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\JsonResponse;

class ProductApiController extends Controller
{
    // it returns a json file that contains all the products
    public function index(): JsonResponse
    {
        $products = Product::all();
        $viewData = $products;

        return response()->json($viewData, 200);
    }

    // it returns a json file that contains an specific product
    public function show(string $id): JsonResponse
    {
        $product = Product::findOrFail($id);
        $viewData = $product;

        return response()->json($viewData, 200);
    } // 200 is the succesful signal
}
