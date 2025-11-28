<?php

namespace App\Http\Controllers;

class GeneralController extends Controller
{
    public function home()
    {
        return view("home");
    }

    public function about()
    {
        return view("about");
    }

    public function contacts()
    {
        return view("contacts");
    }

    public function store()
    {
        return view("store");
    }

    public function tour()
    {
        return view("tour");
    }
}
