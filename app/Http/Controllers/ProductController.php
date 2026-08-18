<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {  // es un arreglo asociativo
        $viewData = [];
        $viewData['title'] = 'Products - Online Store';
        $viewData['subtitle'] = 'List of products';
        // se guarda la tabla en el arrgelo con clave de productos
        $viewData['products'] = Product::all();

        // el modelo product con all() devuelve una coleccion donde cada elemento es un objeto
        return view('product.index')->with('viewData', $viewData);
        // view es para buscar el archivo que se va a renderizar
        /*
        el metodo view(), lo que hace es instanciar un objeto de la clase
        View. ese objeto tiene un diccionario vacio o con datos default
        como se le añaden datos? con with(), con la clave en el primer parametro
        y el dato en el segundo. lo bueno es que el with() añade este dato al view
        y retorna ese mismo objeto ya con el dato guardado.
        COMO FUNCIONA ESTO?
        en el momento de ejecucion View lo que hace es convertir esas claves del
        diccionario en varaibles que tengan los valores al cual la clave
        estaba relacionada, al ya tener esas varabiles, vamos al archivo de
        blade.php que es recorrido y si encuentra la variable del View inyectada
        en el archivo, la trae y muestra sus datos.
        */

    }

    public function show(string $id): View|RedirectResponse
    {
        $viewData = [];

        try {
            $product = Product::findOrFail($id);
            $viewData['title'] = $product['name'].' - Online Store';
            $viewData['subtitle'] = $product['name'].' - Product information';
            $viewData['product'] = $product; // aqui adentro esta el price, podemos llamarlo en show con [product][price]

            return view('product.show')->with('viewData', $viewData);
        } catch (ModelNotFoundException) {
            return redirect()->route('home.index');
        }
    }

    // hacemos un try catch para seguir con la actividad opcional de ver si el id exixste o no, y si no existe es redirecionado a home
    // muestra los datos de cada producto, el '.' sirve como concatenador
    // delvulve los datos con view

    public function create(): View
    {
        $viewData = []; // to be sent to the view
        $viewData['title'] = 'Create product';

        return view('product.create')->with('viewData', $viewData);
    } // funcion para crear productos

    public function save(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'price' => ['required', 'integer', 'min:1'],
            // metodo de request que con el nombre de los datos del
            // formulario mira si mando un dato y no dejo vacio
        ]);
        Product::create($request->only(['name', 'price']));

        return back();

        // antes:         dd($request->all());
        /* antes:
        $viewData = []; //to be sent to the view
        $viewData["subtitle"] = "Product created succesfully! Yay!";

        return view('product.save') -> with("viewData", $viewData);

        */
        // muestra los datos en pantalla y termina el codigo
        // here will be the code to call the model and save it to the database
    }
}
