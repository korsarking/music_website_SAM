<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function show($slug)
    {
        $category = Category::where("slug", $slug)->with("products")->firstOrFail();

        return view("category.show", ["category" => $category]);
    }
}
