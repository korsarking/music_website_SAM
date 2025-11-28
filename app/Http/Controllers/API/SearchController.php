<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Album;
use App\Models\Track;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $req)
    {
        $query = $req->input("q");

        $products = Product::where('name', 'LIKE', "%{$query}%")
            ->get();

        $categories = Category::where('name', 'LIKE', "%{$query}%")
            ->get();
            
        $albums = Album::where('title', 'LIKE', "%{$query}%")
            ->get();
        
        return response()->json([
            'products'   => $products, 
            'categories' => $categories, 
            'albums'     => $albums
        ]);
    }
}