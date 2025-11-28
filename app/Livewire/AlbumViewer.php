<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Album;

class AlbumViewer extends Component
{
    public Album $album;
    public $currentTrackId = null;

    protected $listeners = ["playTrack" => "playTrack"];

    public function mount($slug)
    {
        $this->album = Album::with("tracks")->where("slug_album", $slug)->firstOrFail();
    }

    public function playTrack($trackId)
    {
        $this->currentTrackId = $trackId;
        $this->emitTo("track-player", "play", $trackId);
    }

    public function render()
    {
        return view("livewire.album-viewer");
    }
}
