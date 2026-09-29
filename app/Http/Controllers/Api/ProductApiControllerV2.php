<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\JsonResponse;

class ProductApiControllerV2 extends Controller
{
    public function index(): JsonResponse
    {
        $products = ProductResource::collection(Product::all());
        $viewData = $products;

        return response()->json($viewData, 200);
    }

    public function show(string $id): JsonResponse
    {
        $product = new ProductResource(Product::findOrFail($id));
        $viewData = $product;

        return response()->json($viewData, 200);
    }
}
