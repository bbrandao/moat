<div>
    <div class="modal-body">
       {{ $modalMessage }}       
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-danger fw-bold text-white" data-bs-dismiss="modal">Cancel</button>
      <button type="button" class="btn btn-success fw-bold text-white" wire:click="deleteAlbum">Confirm</button>
    </div>
</div>
