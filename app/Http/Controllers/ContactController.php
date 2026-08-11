<?php
namespace App\Http\Controllers;


use Illuminate\View\View;

Class ContactController extends Controller{


function index():View {
    $viewData = [];
    $viewData["title"] = "Contact us!";
    $viewData["subtitle"] = "To know more about this page..";
    $viewData["name"] = "Maria Laura Tafur";
    $viewData["dir"] = "London, UK";
    $viewData["tel"] = "300567345";

    return view("home.contact") -> with("viewData", $viewData);

}

}