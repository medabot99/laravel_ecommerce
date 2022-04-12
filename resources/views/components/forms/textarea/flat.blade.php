<div class="form-group">
    <label>{{ $placeholder ?? '' }}</label>
    <textarea class="form-control rounded-0" rows="3" placeholder="{{ $placeholder ?? '' }}" name="{{ $id ?? '' }}" id="{{ $id ?? '' }}" {{ $attributes }}>{{ $value ?? '' }}</textarea>
</div>