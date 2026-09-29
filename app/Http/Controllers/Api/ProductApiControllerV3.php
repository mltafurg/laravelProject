<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\JsonResponse;

class ProductApiControllerV3 extends Controller
{
    public function index(): JsonResponse
    {
        $products = new ProductCollection(Product::all());
        $viewData = $products;

        return response()->json($viewData, 200);
    }

    public function paginate(): JsonResponse
    {
        $products = new ProductCollection(Product::paginate(5));
        $viewData = $products;

        return response()->json($viewData, 200);
    }

    public function store(ProductRequest $request): JsonResponse
    {
        // the data we receive from the HTTP request
        $product = new Product;
        $product->setName($request->input('name'));
        $product->setPrice($request->input('price'));

        // we save the new product
        $product->save();

        $viewData = new ProductResource($product);

        return response()->json($viewData, 201);
    }
}
