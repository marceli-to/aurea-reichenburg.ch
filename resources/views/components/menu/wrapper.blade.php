<nav 
  x-show="menu" 
  x-cloak 
  class="bg-white md:bg-transparent fixed left-0 top-80 z-[120] md:top-0 md:relative w-full md:w-auto h-[calc(100dvh_-_80px)] md:h-auto md:!block">
  <ul class="flex flex-col md:flex-row gap-y-20 md:gap-y-0 md:gap-x-40 pl-20 pt-40 md:p-0">
    <li>
      <a 
        href="/#konzept"
        @click="menu = false"
        class="font-bold text-xl md:text-lg text-oxblood hover:text-olive transition-all uppercase tracking-wider md:tracking-widest"
        title="Konzept">
        Konzept
      </a>
    </li>
    <li>
      <a 
        href="/#lage"
        @click="menu = false"
        class="font-bold text-xl md:text-lg text-oxblood hover:text-olive transition-all uppercase tracking-wider md:tracking-widest"
        title="Lage">
        Lage
      </a>
    </li>
    <li>
      <a 
        href="/#kontakt"
        @click="menu = false"
        class="font-bold text-xl md:text-lg text-oxblood hover:text-olive transition-all uppercase tracking-wider md:tracking-widest"
        title="Kontakt">
        Kontakt
      </a>
    </li>
  </ul>
</nav>
