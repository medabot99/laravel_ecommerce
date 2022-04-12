<div class="form-group">
    <label for="{{ $id ?? '' }}" class="col-sm-2 col-form-label">{{ $placeholder ?? '' }}</label>
    <div class="col-sm-10">
        <textarea class="form-control" rows="3" placeholder="{{ $placeholder ?? '' }}" name="{{ $id ?? '' }}" id="{{ $id ?? '' }}" {{ $attributes }}>{{ $value ?? '' }}</textarea>
    </div>
</div>