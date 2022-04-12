<div class="form-group">
    <label for="{{ $id ?? '' }}">{{ $placeholder ?? '' }}</label>
    <select class="custom-select form-control-border" name="{{ $id ?? '' }}" id="{{ $id ?? '' }}" {{ $attributes }}>
        {{ $slot }}
    </select>
</div>