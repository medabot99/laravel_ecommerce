<div class="custom-control custom-{{ $type ?? '' }}">
    <input class="custom-control-input custom-control-input-{{ $color ?? '' }}" type="{{ $type ?? '' }}" id="{{ $id ?? '' }} - {{ $value ?? '' }}" name="{{ $id ?? '' }}" value="{{ $value ?? '' }}" {{ $isChecked($value) ? 'checked' : '' }} {{ $attributes }}>
    <label for="{{ $id ?? '' }} - {{ $value ?? '' }}" class="custom-control-label">{{ $placeholder ?? '' }}</label>
</div>