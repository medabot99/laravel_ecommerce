<div class="modal fade" id="{{ $id ?? '' }}">
    <div class='modal-dialog {{ $size != null ? "modal-{$ize}" : "" }}'>
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">{{ $title ?? '' }}</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>
              {{ $body }}
          </p>
        </div>
        <div class="modal-footer justify-content-between">
          <div class="col-md-2">
            <button type="button" class="btn btn-{{ $cancelColor ?? '' }}" data-dismiss="modal">{{ $cancelText ?? '' }}</button>
          </div>
          <div class="col-md-5">
            {{ $footer }}
            <!--<button type="button" class="btn btn-primary">Save changes</button>-->             
          </div>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
  <!-- /.modal -->