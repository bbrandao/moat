<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Album;
use App\Models\Artist;

class AlbumEdit extends Component
{
    public $albumId;
    
    public $album;

    public $albumArtist;

    public $albumName;

    public $albumYear;

    public $artistList = array();

    protected $rules;

    protected $listeners = ['modalEditOpened' => 'getAlbum'];

    
    public function boot()
    {
        $this->rules    = [
            'albumArtist' => 'required|int',
            'albumName' => 'required|string',
            'albumYear' => 'required|int|min:1900|max:' . date('Y')
        ];
    }

    public function render()
    {
        return view('livewire.album-edit');
    }

    public function getAlbum($albumId)
    {
        $this->albumId = $albumId;
        $this->album   = Album::find($this->albumId);

        // set 
        $this->albumArtist  = $this->album->artist_id;
        $this->albumName    = $this->album->name;
        $this->albumYear    = $this->album->year;
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

        // get album
        $album  = Album::find($this->albumId);

        // update album
        $album->artist_id   = $this->albumArtist;
        $album->name        = $this->albumName;
        $album->year        = $this->albumYear;
        $album->save();

        // reset 
        $this->albumArtist  = null;
        $this->albumName    = null;
        $this->albumYear    = null;

        // event
        $this->emit('albumUpdated');
        $this->dispatchBrowserEvent('albumUpdated');
    }

    /**
     * Fire a edit album event
     */
    public function openEditModal($albumId)
    {
        $this->emit('editAlbum', $albumId);
    }
}
