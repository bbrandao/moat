<div wire:init="loadArtistList">

    <x-slot name="header">      

        <div class="row">
            <div class="col-8">
                <h2 class="h4 font-weight-bold m-0">
                    {{ __('Artists List') }}
                </h2>                
            </div>
            <div class="col-4" style="text-align: right;">
                <button class="btn btn-primary fw-bold text-white" data-bs-toggle="modal" data-bs-target="#modalAddAlbum">New Album</button>                
            </div>
        </div>
    </x-slot>

    <div wire:loading wire:target="loadArtistList">
        <x-loading />
    </div>

    @if($loadSuccess)
        @if(count($arrArtist))
        <div class="container">
            <div class="row">
                <div class="card h-100">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" style="width: 80%">Artist</th>
                                    <th scope="col"></th>                            
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($arrArtist as $artist)
                                <tr>                            
                                    <td>
                                        <h5 class="m-0">{{ $artist->name }}</h5>
                                        <a href="https://twitter.com/{{ $artist->twitter }}" class="link-primary text-decoration-none m-0" target="_blank">{{ $artist->twitter }}</a><br />
                                        <small class="text-muted m-0">
                                            @php 
                                            $countAlbums    = $artist->albums()->count();
                                            $labelAlbums    = "no albums";

                                            if ($countAlbums == 1)
                                                $labelAlbums    = $countAlbums . " album";

                                            if ($countAlbums > 1)
                                                $labelAlbums    = $countAlbums . " albums";

                                            echo $labelAlbums;
                                            @endphp
                                        </small>
                                    </td>
                                    <td class="align-middle" style="text-align: right;">                                        
                                        <a href="{{ route('albums', ['id' => $artist->id]) }}" class="btn btn-success text-white fw-bold">Albums</a>
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
    @else
        <div class="alert alert-primary" role="alert">
            <strong>Failed to load artist list!</strong> Please try again.
        </div>
    @endif

    @section('modals')
      <!-- modal new album -->
      <div class="modal fade" id="modalAddAlbum" tabindex="-1" aria-labelledby="modalAddAlbum" aria-modal="true" role="dialog" style="display: none;">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalAddAlbum">New Album</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            @livewire('album-add')
          </div>
        </div>
      </div>
      <!-- end modal new album -->
    @endsection

    @section('scripts')
        <script>
            // listener to close new album modal
            window.addEventListener('albumAdded', event => {
                let btn = document.getElementsByClassName('btn-close')                
                btn[0].click();
            })
        </script>
    @endsection
    
</div>
