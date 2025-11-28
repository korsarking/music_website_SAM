<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Track;

class TrackRatingComponent extends Component
{
    public Track $track;

    public function mount($track)
    {
        $this->track = $track;
    }

    public function rate($stars)
    {
        $this->track->rating_votes++;
        $this->track->rating_total += (int)$stars;
        $this->track->save();
        $this->track->refresh();
    }

    public function render()
    {
        return view('components.track-rating-component');
    }
}
