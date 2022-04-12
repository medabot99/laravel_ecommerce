<div class="form-group">
    <label for="{{ $id ?? '' }}">{{ $placeholder ?? '' }}</label>
    <input type="{{ $type ?? '' }}" class="form-control form-control-border" id="{{ $id ?? '' }}" name="{{ $id ?? '' }}" placeholder="{{ $placeholder ?? '' }}" value="{{ $value ?? '' }}" {{ $attributes }}>
</div>