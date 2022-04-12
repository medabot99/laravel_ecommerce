<a class='btn btn-app {{ $color != null ? "btn-{$color}" : "" }} {{ $addClass }}' href="{{ $link ?? '' }}" id="{{ $id ?? '' }}" {{ $attributes }}>
    <i class="fas {{ $icon ?? '' }}"></i> {{ $placeholder ?? '' }}
</a>