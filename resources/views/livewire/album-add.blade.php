<div wire:init="loadArtistList">
  <div class="modal-body">                
    <form>      
      <div class="mb-3">
        <label for="albumArtist" class="col-form-label">Artist:</label>                                   
        <select id="albumArtist" name="albumArtist" class="form-select" required wire:model.defer="albumArtist" @isset($artistId) disabled @endisset>                                                                  
            <option value="">Select an artist</option>            
            @foreach ($artistList as $artist)            
              <option value="{{ $artist->id }}">{{ $artist->name }}</option>              
            @endforeach            
        </select>
        @error('albumArtist') <span class="text-danger">{{ $message }}</span> @enderror        
      </div>      
      <div class="mb-3">
        <label for="albumName" class="col-form-label">Album Name:</label>
        <input type="text" class="form-control" id="albumName" name="albumName" maxlength="50" required wire:model.defer="albumName">
        @error('albumName') <span class="text-danger">{{ $message }}</span> @enderror
      </div>
      <div class="mb-3">
        <label for="albumYear" class="col-form-label">Year:</label>
        <select id="albumYear" name="albumYear" class="form-select" required wire:model.defer="albumYear">
            <option value=""></option>
            @for ($year = date('Y'); $year >= 1900; $year--)
            <option value="{{ $year }}">{{ $year }}</option>
            @endfor
        </select>
        @error('albumYear') <span class="text-danger">{{ $message }}</span> @enderror
      </div>
    </form>
  </div>
  <div class="modal-footer">
    <div wire:loading wire:target="saveAlbum" class="me-auto">
      Saving album...
    </div>                  
    <button type="button" class="btn btn-success fw-bold text-white" wire:click="saveAlbum" wire:loading.attr="disabled" wire:target="saveAlbum">Save</button>
  </div>
</div>
