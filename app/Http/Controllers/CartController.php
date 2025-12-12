<?php

namespace App\Http\Controllers;

class CartController extends Controller
{
    public function show() 
    {
        return view("cart.show");
    }
}
