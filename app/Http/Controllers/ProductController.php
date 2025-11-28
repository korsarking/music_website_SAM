<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function show($slug)
    {
        $product = Product::where("slug", $slug)->firstOrFail();

        return view("product.show", [
            "product" => $product
        ]);
    }
}
