<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {   // it's an associative array
        $viewData = [];
        $viewData['title'] = 'Products - Online Store';
        $viewData['subtitle'] = 'List of products';
        // we get all the products with each of the comments a product gets
        $viewData['products'] = Product::with('comments')->get();

        // before: the Product model's all() returns a collection where each element is an object
        return view('product.index')->with('viewData', $viewData);
        // view is used to find the file that will be rendered
        /*
        what the view() method does is instantiate an object of the View
        class. that object has an empty dictionary, or one with default
        data. how do you add data to it? with with(), passing the key
        as the first parameter and the data as the second. the nice thing
        is that with() adds this data to the view and
        returns that same object already holding the data.
        HOW DOES THIS WORK?
        at runtime, View takes those dictionary keys and turns
        them into variables holding the values that the key
        was associated with; once those variables exist, we go to the
        blade.php file, which is scanned, and if it finds the View's
        injected variable in the file, it brings it in and displays its data.
        */

    }

    public function show(string $id): View|RedirectResponse
    {
        $viewData = [];

        try {
            $product = Product::findOrFail($id);
            $viewData['title'] = $product->getName().' - Online Store';
            $viewData['subtitle'] = $product->getName().' - Product information';
            $viewData['product'] = $product;

            return view('product.show')->with('viewData', $viewData);
        } catch (ModelNotFoundException) {
            return redirect()->route('home.index');
        }
    }

    // we use a try/catch to continue with the optional task of checking whether the id exists or not, and if it doesn't, redirect to home
    // shows the data for each product, the '.' acts as a concatenator
    // returns the data with view

    public function create(): View
    {
        $viewData = []; // to be sent to the view
        $viewData['title'] = 'Create product';

        return view('product.create')->with('viewData', $viewData);
    } // function to create products

    public function save(ProductRequest $request): RedirectResponse
    {

        Product::create($request->only(['name', 'price']));

        return back();

        // before:         dd($request->all());
        /* before:
        $viewData = []; //to be sent to the view
        $viewData["subtitle"] = "Product created succesfully! Yay!";

        return view('product.save') -> with("viewData", $viewData);

        */
        // displays the data on screen and ends the code
        // here will be the code to call the model and save it to the database

    }
}
