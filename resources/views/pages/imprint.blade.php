@extends('app')
@section('content')
<x-layout.section class="py-30 md:py-60">
  <x-layout.inner class="imprint">
    <h1>Impressum</h1>
    <h2>Vermarktung Erstvermietung</h2>
    <p>
      <strong>Sanjo Management AG</strong><br>
      Ziegelwies 2<br>
      8852 Altendorf<br>
      <a 
        href="tel:+41554466040"
        title="Rufen Sie uns an!"
        class="hover:underline underline-offset-4 decoration-1">
        +41 55 446 60 40
      </a><br>
      <a 
        href="mailto:info@sanjo.ch"
        title="Schreiben Sie uns"
        class="hover:underline underline-offset-4 decoration-1">
        info@sanjo.ch
      </a>
    </p>
    <h2>Design und Entwicklung</h2>
    <p>Stoz Werbeagentur AG, Pfäffikon ZH<br><a href="https://www.stoz.ch" target="_blank" rel="noopener" class="hover:underline underline-offset-2 decoration-1">stoz.ch</a></p>
    <h2>Programmierung</h2>
    <p>Marcel Stadelmann, Zürich<br><a href="https://marceli.to" target="_blank" rel="noopener" class="hover:underline underline-offset-2 decoration-1">marceli.to</a></p>
  </x-layout.inner>
</x-layout.section>
@endsection