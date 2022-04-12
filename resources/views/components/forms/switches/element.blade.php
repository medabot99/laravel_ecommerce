<div class="form-group">
    <div class="custom-control custom-switch custom-switch-on-{{ $color ?? '' }}">
      <input type="checkbox" class="custom-control-input" id="{{ $id ?? '' }}" name="{{ $id ?? '' }}" value="{{ $value ?? '' }}" {{ $isChecked($value) ? 'checked' : '' }} {{ $attributes }}>
      <label class="custom-control-label" for="{{ $id ?? '' }}">{{ $placeholder ?? '' }}</label>
    </div>
</div>