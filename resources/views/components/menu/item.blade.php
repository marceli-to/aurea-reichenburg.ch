@props(['route', 'title' => '', 'active' => false])
<li>
  <a 
    href="{{ route($route) }}" 
    title="{{ $title }}"
    class="block w-full text-white uppercase text-md md:text-md relative group {{ $active ? 'font-sans-bold font-bold' : '' }}">
    {{ $title }}
    <span class="absolute left-0 -bottom-4 w-full h-1 bg-white opacity-0 group-hover:opacity-100 {{ $active ? 'opacity-100' : '' }} max-w-[70%] lg:max-w-[80%]"></span>
  </a>
</li>