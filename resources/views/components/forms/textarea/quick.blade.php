<div class="form-group">
    <label>{{ $placeholder ?? '' }}</label>
    <textarea class="form-control" rows="3" placeholder="{{ $placeholder ?? '' }}" name="{{ $id ?? '' }}" id="{{ $id ?? '' }}" {{ $attributes }}>{{ $value ?? '' }}</textarea>
</div>