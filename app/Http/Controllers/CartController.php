<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Product;

class CartController extends Controller
{
    public function index(Request $request): View
    {   $products = Product::all();
        $cartProducts = [];
        $cartProductData = $request->session()->get('cart_product_data'); //we get the products stored in session
        // en session hay una variable llamada ('cart_product_data') la cual buscamos y traemos aqui para guardar
        // sus datos en la variable 
        if ($cartProductData) { // si no esta vacia se hace esto: 
            foreach (array_keys($cartProductData) as $key) {
                // recorremos el array con array_keys lo que hace es devolver solo las CLAVES del array
                // ahi recorremos con foreach las claves y vamos guardando en cada iteracion la clave en $key
                if (isset($products[$key])) { // nos preguntamos si existe esa clave (el id) en la lista de productos
                    $cartProducts[$key] = $products[$key]; // si es asi se guarda la instancia del producto en
                    // el arreglo cart 
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
    { // recibe el id del producto, crea el arreglo que recibe la info del session que tiene los productos del carrito
        $cartProductData = $request->session()->get('cart_product_data');
        $cartProductData[$id] = $id;
        // aqui el arreeglo agrega un nuevo elemento con el valor de id siendo la posicion y lo que se guarda
        $request->session()->put('cart_product_data', $cartProductData);
        // agregamos a el espacio de session el array

        return back();
    }

    public function removeAll(Request $request): RedirectResponse
    {
        $request->session()->forget('cart_product_data');
        // vaciamos el espacio 

        return back();
    }
}
