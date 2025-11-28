<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Album;

class AlbumList extends Component
{
    public $perPage = 12;

    public function render()
    {
        $albums = Album::withCount("tracks")->orderBy("release_date", "desc")->paginate($this->perPage);
        return view("livewire.albums-list", compact("albums"));
    }
}
