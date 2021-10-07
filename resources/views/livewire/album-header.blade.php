<div>
    <div class="row">
        <div class="col-8">
            <h2 class="h4 font-weight-bold m-0">
                {{ $artistName }}
            </h2>
            <a href="https://twitter.com/{{ $artistTwitter }}" class="link-primary text-decoration-none" target="_blank">{{ $artistTwitter }}</a>
        </div>
        <div class="col-4" style="text-align: right;">
            <button class="btn btn-primary fw-bold text-white" data-bs-toggle="modal" data-bs-target="#modalAddAlbum">New Album</button>                
        </div>
    </div>
</div>
