<?php
namespace App\Http\Controllers;
//OJO, PONER EL PHP INCIIO EN LA PRIMERA LINEA
// ruta logica de la clase HomeController

use Illuminate\View\View; // IMPORTACION, usamos la clase view del framework
 
class HomeController extends Controller // extends es para herencia!!
{
    public function index(): View // funcion publica llamada index
    // devuelve un valor tipo View! 
    {
        return view('home.index'); 
        /*
        view lo que hace es procesar el archivo que le dan
        para renderizarlo y mostrarlo al usuario
        el punto actua como '/' antes del punto va 
        el nombre de la carpeta y despues el nombre del archivo
        */
    }

    function contact():View {
    $viewData = [];
    $viewData["title"] = "Contact us!";
    $viewData["subtitle"] = "To know more about this page..";
    $viewData["name"] = "Maria Laura Tafur";
    $viewData["dir"] = "London, UK";
    $viewData["tel"] = "300567345";

    return view("home.contact") -> with("viewData", $viewData);

    }


    function about():View{
        $viewData = [];
        $viewData["title"] = "About us - Online Store";
        $viewData["subtitle"] = "About us";
        $viewData["description"] = "This is an about page ...";
        $viewData["author"] = "Developed by: Your Name";

        return view("home.about") -> with("viewData",$viewData);
    }


}

