<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Artist;  
use App\Models\Album;  

class AlbumAdd extends Component
{
    public $artistId;
    
    public $albumArtist;

    public $albumName;

    public $albumYear;

    public $artistList = array();

    protected $rules;

    public function boot()
    {
        $this->albumArtist = $this->artistId;

        $this->rules    = [
            'albumArtist' => 'required|int',
            'albumName' => 'required|string',
            'albumYear' => 'required|int|min:1900|max:' . date('Y')
        ];
    }
    
    public function render()
    {   
        return view('livewire.album-add');
    }

    public function hydrate()
    {
        $this->loadArtistList();
    }

    /**
     * Load artist list     
     */
    public function loadArtistList()
    {
        // get artists
        $this->artistList    = Artist::all();
    }

    /**
     * Save artist album
     */
    public function saveAlbum()
    {   
        $this->validate();

        Album::create([
            'artist_id' => $this->albumArtist,
            'name' => $this->albumName,
            'year' => $this->albumYear
        ]);

        // reset 
        $this->albumName    = "";
        $this->albumYear    = "";

        // event
        $this->emit('albumAdded');
        $this->dispatchBrowserEvent('albumAdded');
    }
}
