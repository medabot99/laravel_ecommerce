@if ($type == 'href')
    <a href="{{ $link ?? '' }}" class='btn btn-block btn-gradient-{{ $color ?? "" }} {{ $size != null ? "btn-{$size}" : "" }} {{ $flat ? "btn-flat" : "" }} {{ $addClass }}' id="{{ $id ?? '' }}" {{ $attributes }}>
        @if ($icon != null)
            <i class="fa {{ $icon ?? '' }}"></i> 
        @endif
        &nbsp;{{ $placeholder ?? '' }}
    </a>
@else
    <button type="{{ $type }}" class='btn btn-block btn-gradient-{{ $color ?? "" }} {{ $size != null ? "btn-{$size}" : "" }} {{ $flat ? "btn-flat" : "" }}' id="{{ $id ?? '' }}" {{ $attributes }}>
        @if ($icon != null)
            <i class="fa {{ $icon ?? '' }}"></i> 
        @endif
        &nbsp;{{ $placeholder ?? '' }}
    </button>
@endif