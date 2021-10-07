<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use App\Models\Artist;
use App\Models\Album;

class AlbumList extends Component
{
    public Artist $artist;

    public $artistId;

    public $arrAlbum;

    protected $listeners = [
        'albumAdded' => 'loadAlbumList',
        'albumUpdated' => 'loadAlbumList',
        'albumDeleted' => 'loadAlbumList'];

    public function mount($id)
    {   
        // init        
        $this->artistId = $id;
        $this->arrAlbum = array();
    }
    
    public function render()
    {
        return view('livewire.album-list');
    }

    /**
     * Load artist list from Moat API
     * 
     */
    public function getArtist()
    {
        // get artist                
        $this->artist = Artist::find($this->artistId);

        // check if exist artist
        if ($this->artist->id === null)
        {
            // redirect
            redirect()->to('artists');

        } else {

            // update album list
            $this->loadAlbumList();
            
            // artist updated
            $this->emit('artistUpdated', $this->artist->name, $this->artist->twitter);
        }
    }

    /**
     * Load artist's albums
     * 
     */
    public function loadAlbumList()
    {
        $this->arrAlbum = Album::where('artist_id', $this->artistId)->orderByDesc('year')->get();
    }
}
