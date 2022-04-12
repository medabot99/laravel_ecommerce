<div class="form-group row">
    <label for="{{ $id ?? '' }}" class="col-sm-2 col-form-label">{{ $placeholder ?? '' }}</label>
    <div class="col-sm-10">
        <select class="form-control" name="{{ $id ?? '' }}" id="{{ $id ?? '' }}" {{ $attributes }}>
            {{ $slot }}
        </select>
    </div>
</div>