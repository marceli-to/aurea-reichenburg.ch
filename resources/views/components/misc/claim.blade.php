@props([
  'text' => '',
  'class' => ''
])
<div class="font-bold text-sand opacity-80 text-4xl md:text-5xl lg:text-6xl leading-[1.05] {{ $class }}">
  <span class="block opacity-0 -translate-y-150 transition duration-1000 fade-in-on-scroll relative z-50">
    {!! $text !!}
  </span>
</div>

