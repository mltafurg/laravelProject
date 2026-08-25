<?php

namespace App\Http\Controllers;

// NOTE, PUT THE OPENING PHP TAG ON THE FIRST LINE
// logical route of the HomeController class

use Illuminate\View\View; // IMPORT, we use the framework's View class

class HomeController extends Controller // extends is for inheritance!!
{
    public function index(): View
    // public function called index
    // returns a value of type View!
    {
        return view('home.index');
        /*
        view processes the given file
        to render it and show it to the user
        the dot acts as a '/' before the dot goes
        the folder name and after it the file name
        */
    }

    public function contact(): View
    {
        $viewData = [];
        $viewData['title'] = 'Contact us!';
        $viewData['subtitle'] = 'To know more about this page..';
        $viewData['name'] = 'Maria Laura Tafur';
        $viewData['dir'] = 'London, UK';
        $viewData['tel'] = '300567345';

        return view('home.contact')->with('viewData', $viewData);

    }

    public function about(): View
    {
        $viewData = [];
        $viewData['title'] = 'About us - Online Store';
        $viewData['subtitle'] = 'About us';
        $viewData['description'] = 'This is an about page ...';
        $viewData['author'] = 'Developed by: Your Name';

        return view('home.about')->with('viewData', $viewData);
    }
}
