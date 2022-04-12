<div class="form-group">
    <label for="{{ $id ?? '' }}">{{ $label ?? '' }}</label>
    <div class="custom-file">
      <input type="file" class="custom-file-input" id="{{ $id ?? '' }}" name="{{ $id ?? '' }}" {{ $attributes }}>
      <label class="custom-file-label" for="customFile">{{ $placeholder ?? '' }}</label>
    </div>
  </div>