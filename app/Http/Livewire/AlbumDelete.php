<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Album;


class AlbumDelete extends Component
{
    public $albumId;

    public $album;
    
    public $modalMessage;

    protected $listeners = ['modalDeleteOpened' => 'getAlbum'];

    
    public function render()
    {
        return view('livewire.album-delete');
    }

    public function getAlbum($albumId)
    {
        $this->albumId = $albumId;        
        $this->album   = Album::find($this->albumId);
        
        // set 
        $this->modalMessage = "Do you really want to delete the album " . $this->album->name . "?";
    }

    public function deleteAlbum()
    {
        // check if the user can delete an album
        if (Auth::user()->cannot('delete', Album::class)) {
            redirect()->to('artists');
        }
        
        // get album
        $album   = Album::find($this->albumId);
        $album->delete();

        // reset
        $this->albumId      = null;
        $this->album        = null;
        $this->modalMessage = null;

        // event
        $this->emit('albumDeleted');
        $this->dispatchBrowserEvent('albumDeleted');
    }
}
