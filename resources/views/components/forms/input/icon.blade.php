<div class="input-group mb-3">
    @if ($position == 'front')
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas {{ $icon ?? '' }}"></i></span>
      </div>
      <input type="{{ $type ?? '' }}" id="{{ $id ?? '' }}" name="{{ $id ?? '' }}" class="form-control" placeholder="{{ $placeholder ?? '' }}">
    @else
        <input type="{{ $type ?? '' }}" id="{{ $id ?? '' }}" name="{{ $id ?? '' }}" class="form-control" placeholder="{{ $placeholder ?? '' }}">
        <div class="input-group-append">
        <span class="input-group-text"><i class="fas {{ $icon ?? '' }}"></i></span>
        </div>   
    @endif 
</div>
