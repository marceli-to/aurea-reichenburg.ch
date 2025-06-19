{{-- @props(['image', 'alt' => '', 'format' => '.jpg', 'lazy' => true])
<picture class="w-full">
  <source media="(min-width: 768px)" srcset="/media/img/{{ $image }}-lg{{ $format }}">
  <source srcset="/media/img/{{ $image }}{{ $format }}">
  <img 
    src="/media/img/{{ $image }}-sm{{ $format }}" 
    alt="{{ $alt }}" 
    title="{{ $alt }}" 
    height="1600" 
    width="1050"
    @if ($lazy)
    loading="lazy"
    @endif
    {{ $attributes->merge(['class' => 'block w-full object-cover']) }}>
</picture> --}}

@props(['image', 'alt' => '', 'format' => '.jpg', 'lazy' => true])

<picture class="w-full">
  <source media="(min-width: 768px)" type="image/avif" srcset="/media/img/{{ $image }}-lg.avif">
  <source type="image/avif" srcset="/media/img/{{ $image }}.avif">
  <source media="(min-width: 768px)" type="image/webp" srcset="/media/img/{{ $image }}-lg.webp">
  <source type="image/webp" srcset="/media/img/{{ $image }}.webp">
  <source media="(min-width: 768px)" srcset="/media/img/{{ $image }}-lg{{ $format }}">
  <source srcset="/media/img/{{ $image }}{{ $format }}">
  <img 
    src="/media/img/{{ $image }}-sm{{ $format }}" 
    alt="{{ $alt }}" 
    title="{{ $alt }}" 
    height="1600" 
    width="1050"
    @if ($lazy)
    loading="lazy"
    @endif
    {{ $attributes->merge(['class' => 'block w-full object-cover']) }}>
</picture>