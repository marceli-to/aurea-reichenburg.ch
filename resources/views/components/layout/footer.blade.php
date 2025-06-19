<footer class="bg-oxblood text-white text-sm md:text-base">
  <x-layout.inner class="py-10 md:py-15">
    <nav class="flex justify-between">
      <ul class="flex gap-x-20">
        <li>
          <a 
            href="{{ route('page.imprint') }}" 
            title="Impressum"
            class="hover:underline underline-offset-4 decoration-1">
            Impressum
          </a>
        </li>
        <li>
          <a 
            href="{{ route('page.privacy') }}" 
            title="Datenschutz"
            class="hover:underline underline-offset-4 decoration-1">
            Datenschutz
          </a>
        </li>
      </ul>
      <ul>
        <li>
          <a 
            href="https://stoz.ch" 
            title="Design by stoz"
            target="_blank"
            class="hover:underline underline-offset-4 decoration-1">
            design by stoz
          </a>
        </li>
      </ul>
    </nav>
  </x-layout.inner>
</footer>
@vite('resources/js/app.js')
@livewireScripts
</body>
</html>
<!-- made with ❤ by stoz.ch & marceli.to -->