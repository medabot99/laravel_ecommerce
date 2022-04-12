<div class="form-group">
    <label for="{{ $id ?? '' }}">{{ $placeholder ?? '' }}</label>
    <select class="custom-select rounded-0" name="{{ $id ?? '' }}" id="{{ $id ?? '' }}" {{ $attributes }}>
        {{ $slot }}
    </select>
</div>