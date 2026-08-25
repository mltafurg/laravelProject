<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CartController extends Controller
{
    public function index(Request $request): View
    {
        $products = Product::all();
        $cartProducts = [];
        $cartProductData = $request->session()->get('cart_product_data'); // we get the products stored in session
        // in the session there is a variable called ('cart_product_data') which we look for and bring here to save
        // its data in the variable
        if ($cartProductData) { // if it's not empty, we do this:
            foreach (array_keys($cartProductData) as $key) {
                // we loop through the array with array_keys, which returns only the KEYS of the array
                // there we loop through the keys with foreach and store each key in $key on every iteration

                if (isset($products[$key])) { // we check whether that key (the id) exists in the product list
                    $cartProducts[$key] = $products[$key]; // if so, the product instance is stored in
                    // the cart array
                }
            }
        }

        $viewData = [];
        $viewData['title'] = 'Cart - Online Store';
        $viewData['subtitle'] = 'Shopping Cart';
        $viewData['products'] = $products;
        $viewData['cartProducts'] = $cartProducts;

        return view('cart.index')->with('viewData', $viewData);
    }

    public function add(string $id, Request $request): RedirectResponse
    { // receives the product id, creates the array that receives the session info holding the cart products
        $cartProductData = $request->session()->get('cart_product_data');
        $cartProductData[$id] = $id;
        // here the array adds a new element with the id value being the position and the value stored
        $request->session()->put('cart_product_data', $cartProductData);
        // we add the array to the session space

        return back();
    }

    public function removeAll(Request $request): RedirectResponse
    {
        $request->session()->forget('cart_product_data');
        // we empty the space

        return back();
    }
}
