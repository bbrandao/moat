<div wire:init="getArtist">
    <x-slot name="header">
        <livewire:album-header>
    </x-slot>

    <div wire:loading wire:target="getArtist">
        <x-loading />
    </div>

    @if(count($arrAlbum))
    <div class="container">
        <div class="row">
            <div class="card h-100">
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col" style="width: 80%">Albums</th>
                                <th scope="col"></th>                            
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($arrAlbum as $album)
                            <tr>                            
                                <td>
                                    <h5 class="m-0">{{ $album->name }}</h5>                                    
                                    <small class="text-muted m-0">{{ $album->year }}</small>
                                </td>
                                <td class="align-middle" style="text-align: right;">                                        
                                    <button class="btn btn-primary text-white fw-bold" data-bs-toggle="modal" data-bs-target="#modalEditAlbum" wire:click="$emit('modalEditOpened', {{  $album->id  }})">Edit</button>
                                    @can('delete', App\Models\Album::class)
                                    <button class="btn btn-danger text-white fw-bold" data-bs-toggle="modal" data-bs-target="#modalDeleteAlbum" wire:click="$emit('modalDeleteOpened', {{  $album->id  }})">Delete</button>
                                    @endcan
                                </td>                            
                            </tr>
                            @endforeach                          
                        </tbody>                      
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endif

    @section('modals')

      <!-- modal new album -->
      <div class="modal fade" id="modalAddAlbum" tabindex="-1" aria-labelledby="modalAddAlbumLabel" aria-modal="true" role="dialog" style="display: none;">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalAddAlbumLabel">New Album</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            @livewire('album-add', ['artistId' => $artistId])
          </div>
        </div>
      </div>
      <!-- end modal ne album -->

      <!-- modal edit album -->
      <div class="modal fade" id="modalEditAlbum" tabindex="-1" aria-labelledby="modalEditAlbumLabel" aria-modal="true" role="dialog" style="display: none;">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalEditAlbumLabel">Edit Album</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            @livewire('album-edit')
          </div>
        </div>
      </div>
      <!-- end modal edit album -->

      <!-- modal delete album -->
      <div class="modal fade" id="modalDeleteAlbum" tabindex="-1" aria-labelledby="modalDeleteAlbumLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalDeleteAlbumLabel">Delete Album</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            @livewire('album-delete')
          </div>
        </div>
      </div>
      <!-- end modal delete album -->
    @endsection

    @section('scripts')
        <script>
            
            // event listener to close modal new album
            window.addEventListener('albumAdded', event => {
                let btn = document.getElementsByClassName('btn-close')                
                btn[0].click();
            })

            // event listener to close modal edit album
            window.addEventListener('albumUpdated', event => {
                let btn = document.getElementsByClassName('btn-close')                
                btn[1].click();
            })

            // event listener to close modal delete album
            window.addEventListener('albumDeleted', event => {
                let btn = document.getElementsByClassName('btn-close')                
                btn[2].click();
            })
        </script>
    @endsection

</div>
