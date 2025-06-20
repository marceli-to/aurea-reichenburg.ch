@props([
  'image' => '', 
  'alt' => '',
  'class' => '' 
])

<figure class="relative {{ $class }}">
  <picture>

    <source 
      srcset="/media/{{ $image }}-lg.avif" 
      type="image/avif" 
      media="(min-width: 1280px)">
  
    <source 
      srcset="/media/{{ $image }}-md.avif" 
      type="image/avif" 
      media="(min-width: 768px)">
    
    <source 
      srcset="/media/{{ $image }}.avif" 
      type="image/avif">
  
    <source 
      srcset="/media/{{ $image }}-lg.jpg" 
      type="image/jpeg" 
      media="(min-width: 1280px)">
  
    <source 
      srcset="/media/{{ $image }}-md.jpg" 
      type="image/jpeg" 
      media="(min-width: 768px)">
    
    <source 
      srcset="/media/{{ $image }}.jpg" 
      type="image/jpeg">

    <img 
      src="/media/{{ $image }}.jpg" 
      alt="{{ $alt }}" 
      class="w-full h-auto object-cover" />
  </picture>
</figure>
