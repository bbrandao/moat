<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use App\Models\Artist;
use Illuminate\Support\Arr;

class ArtistList extends Component
{
    /**
     * Array with list of artists
     */
    public $arrArtist   = array();

    protected $listeners = ['albumAdded' => 'loadArtistList'];

    /**
     * Flag to indicate load artists list successful
     */
    public $loadSuccess  = true;

    public function render()
    {
        return view('livewire.artist-list');
    }

    /**
     * Load artist list     
     */
    public function loadArtistList()
    {
        // get artists
        $this->arrArtist    = Artist::all();

        // flag 
        $this->loadSuccess   = (count($this->arrArtist)) > 0 ? true : false;
    }
}
