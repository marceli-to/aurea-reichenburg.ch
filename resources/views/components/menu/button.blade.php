
  <a 
    href="javascript:;" 
    x-on:click="menu = ! menu" 
    title="Menü anzeigen"
    class="text-oxblood md:hidden w-28 h-24 flex items-center justify-center">
    <span x-show="menu === false">
      <x-icons.burger class="w-28 h-auto" />
    </span>
    <span x-cloak x-show="menu === true">
      <x-icons.cross class="w-24 h-auto " />
    </span>
  </a>
