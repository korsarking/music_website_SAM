<?php

namespace App\Http\Controllers;

use App\Models\Album;

class AlbumController extends Controller
{
    public function index()
    {
        return view("livewire.album-list", [
            "albums" => Album::orderByDesc("released_at")->get(),
        ]);
    }

    public function show($slug)
    {
        $album = Album::where("slug_album", $slug)->with("tracks")->firstOrFail();

         return view("livewire.album-viewer", compact("album"));
    }
}
