<div class="alert alert-{{ $type }} alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h5><i class="icon fas {{ $type == 'danger' ? 'fa-ban' : 'fa-check' }}"></i> {{ $header }}!</h5>
    @foreach ($message as $msg)
        {{ $msg }} <br />
    @endforeach
  </div>