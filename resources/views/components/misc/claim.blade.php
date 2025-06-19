@props([
  'text' => '',
  'class' => ''
])
<div class="font-bold text-sand opacity-80 text-4xl md:text-5xl lg:text-6xl leading-[1.05] {{ $class }}">
  {!! $text !!}
</div>