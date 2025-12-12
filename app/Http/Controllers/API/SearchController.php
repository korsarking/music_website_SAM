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
        $query = mb_strtolower($req->input('q'));
        $lang  = app()->getLocale();

        return response()->json([
            'products' => Product::whereRaw(
                "LOWER(name->>'$.{$lang}') LIKE ?",
                ["%{$query}%"]
            )->get(),

            'categories' => Category::whereRaw(
                "LOWER(name->>'$.{$lang}') LIKE ?",
                ["%{$query}%"]
            )->get(),

            'albums' => Album::whereRaw(
                "LOWER(title->>'$.{$lang}') LIKE ?",
                ["%{$query}%"]
            )->get(),
        ]);
    }
}