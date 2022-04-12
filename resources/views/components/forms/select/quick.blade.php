<div class="form-group">
    <label>{{ $placeholder ?? '' }}</label>
    <select class="form-control" name="{{ $id ?? '' }}" id="{{ $id ?? '' }}" {{ $attributes }}>
      {{ $slot }}
    </select>
</div>