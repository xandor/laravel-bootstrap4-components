@php
    if (isset($labelTooltip) == false && strlen($label ?? '') > 20) {
        $labelTooltip = $label ?? '';
    }
    if(isset($labelTop) == false) {
        $labelTop = false;
    }
    if($labelTop) {
        $labelStyle = 'block-left d-flex align-items-top px-2 py-1';
    } else {
        $labelStyle = 'block-left d-flex align-items-center px-2 py-1';
    }
@endphp
<div class="block-row row rounded {{ $class ?? '' }}"
     @isset($id) id="{{ $id }}" @endisset
     @isset($style) style="{{ $style }}" @endisset
>
    <div class="{{ $labelStyle }}">
        <div class="text-truncate"
             @isset($labelTooltip) title="{{ $labelTooltip }}" data-toggle="tooltip" data-placement="top" @endisset
        >
            {{ $label ?? '' }}
        </div>
    </div>
    <div class="block-right col d-flex align-items-center px-2 py-1">
        {{ $slot }}
    </div>
</div>