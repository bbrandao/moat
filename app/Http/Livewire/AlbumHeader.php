<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AlbumHeader extends Component
{
    public $artistLabel;

    public $artistName;

    public $artistTwitter;

    protected $listeners = ['artistUpdated' => 'updateHeader'];

    public function mount()
    {
        $this->artistLabel      = "";
        $this->artistName       = "";
        $this->artistTwitter    = "";
    }
    
    public function render()
    {
        return view('livewire.album-header');
    }

    public function updateHeader($name, $twitter)
    {
        $this->artistLabel      = "Albums - " . $name;
        $this->artistName       = $name;
        $this->artistTwitter    = $twitter;
    }
}
