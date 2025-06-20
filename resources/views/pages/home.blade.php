@extends('app')
@section('seo_description', '')
@section('content')

<div class="relative z-20 after:bg-olive after:content-[''] after:block after:w-full after:h-[40%] after:bottom-0 after:left-0 after:absolute after:z-10">
  <x-media.visual 
    image="aurea-visual-1" 
    alt="Aurea Reichenburg"
    class="max-w-7xl mx-auto relative z-20" />
</div>

<x-layout.section class="bg-olive">
  <x-layout.inner class="relative pb-20">
    <x-misc.claim 
      text="natürlich.<br>geborgen.<br>zuhause."
      class="absolute left-20 md:left-auto right-30 top-20 -translate-y-[112px] md:-translate-y-[150px] lg:-translate-y-[202px] z-50"
    />
    <article class="text-white md:max-w-[50%] md:py-40 relative top-80 md:top-0 pl-20 pb-100">
      <p><strong>Eingebettet zwischen ländlicher Tradition und imposanter Bergkulisse entsteht ein einzigartiges Wohnensemble aus drei Mehrfamilienhäusern mit 60 Mietwohnungen.</strong></p>
      <p>Ein Wohnungsangebot für jedes Bedürfnis: 2.5 bis 5.5 Zimmerwonungen bieten Raum für Vielfalt – vom gemütlichen Rückzugsort für Singles bis zum grosszügigen Zuhause für Familien.<br><strong>Bezug voraussichtlich im Herbst 2027.</strong></p>
    </article>
    <x-icons.badge-start class="w-200 md:w-[250px] h-auto ml-20 md:absolute md:right-20 md:top-0 md:translate-y-full md:mt-20" />
  </x-layout.inner>
</x-layout.section>

<x-layout.section class="bg-oxblood scroll-mt-60 md:scroll-mt-100" id="konzept">
  <x-layout.inner class="relative text-white py-30 md:py-50">

    <div class="md:columns-2 md:gap-x-30 lg:gap-x-50 pl-20">
      <x-misc.claim 
        text="wohnen.<br>wohlfühlen.<br>verweilen."
        class="md:mb-40 -translate-x-[20px] 2xl:-translate-x-[80px]"
      />
      <p class="mt-20 md:mt-0"><strong>Grosszügige Grundrisse, durchdachte Wohnkonzepte und hochwertige Materialien schaffen ein behagliches Zuhause mit Blick ins Grüne.</strong></p>
      <p>Das Neubauprojekt «auréa» folgt den Kriterien der Nachhaltigkeit: alle Wohnungen sind nach <strong>Minergie-Standard</strong> gebaut und überzeugen mit einem hochwertigen Innenausbau: edle <strong>Parkettböden</strong> in den Wohn- und Schlafbereichen schaffen eine warme, wohnliche Atmosphäre und unterstreichen den Anspruch an Komfort und Qualität. Dank energieeffizienter Bauweise profitieren die zukünftigen Bewohner von einem gesunden Raumklima und tiefem Energieverbrauch: dies auch dank der hauseigenen Photovoltaikanlage, die den Grossteil des Stromverbrauchs umweltfreundlich und lokal erzeugt.</p>
      <p>Die autofreie Umgebung, naturnahe Gestaltungselemente und die sorgfältig geplanten Begegnungszonen fördern eine hohe Wohn- und Lebensqualität – für ein gemeinschaftliches, nachhaltiges Zusammenleben im Einklang mit der Natur. Ein <strong>zentraler Badeteich</strong> mit einheimischen Uferpflanzen, naturnahe Umgebungsgestaltung und individuell nutzbare Schrebergärten schaffen einen Ort der Ruhe und Erholung.</p>
      <p>Im Zuge der Quartiersüberbauung entsteht in unmittelbarer Nähe der neue Standort eines <strong>Doppelkindergartens</strong> sowie weiteren <strong>Einkaufsmöglichkeiten.</strong></p>
    </div>

    <x-misc.facts />

  </x-layout.inner>
</x-layout.section>

<div class="relative pt-20 z-20 after:bg-oxblood after:content-[''] after:block after:w-full after:h-[40%] after:top-0 after:left-0 after:absolute after:z-10">
  <x-media.visual 
    image="aurea-visual-2" 
    alt="Aurea Reichenburg"
    class="max-w-7xl mx-auto relative z-20" />
</div>

<x-layout.section>
  <x-layout.inner class="relative -scroll-mt-80 md:scroll-mt-120" id="lage">
    <article class="md:max-w-[50%] pl-20 py-20 md:pt-40 md:pb-20">
      <p><strong>Das Neubauprojekt befindet sich im Quartier Auhof 7/9/18, 8864 Reichenburg. Geniessen Sie spektakuläre Sonnenaufgänge und ein beeindruckendes Bergpanorama mit Sicht auf den Säntis und die Glarner Alpen.</strong></p>
      <a 
        href="https://maps.app.goo.gl/QZdPFWB7m9XH3YA19"
        title="Google Maps öffnen"
        class="group">
        <x-icons.badge-maps class="mt-20 w-169 md:w-[200px] h-auto group-hover:opacity-80 group-hover:-rotate-2 transition-all" />
      </a>
    </article>
  </x-layout.inner>
  <div class="relative z-20 after:md:bg-olive after:content-[''] after:block after:w-full after:h-[50%] after:bottom-0 after:left-0 after:absolute after:z-10">
    <div class="max-w-7xl mx-auto px-20 md:px-40 relative">
      <x-misc.claim 
        text="berge.<br>panorama.<br>weitsicht."
        class="!text-olive md:!-translate-x-[20px] opacity-80 absolute -top-92 md:-top-130 lg:-top-182 md:right-0 z-30"
      />
    </div>
    <video 
      src="{{ asset('media/aurea-drohne-rorwis-reichenburg.mp4') }}" 
      autoplay 
      controls
      loop
      muted
      class="mt-90 w-full h-auto max-w-7xl mx-auto relative z-20">
    </video>
  </div>
</x-layout.section>

<x-layout.section class="bg-olive py-20 md:py-40 text-white scroll-mt-60 md:scroll-mt-100">
  <x-layout.inner id="kontakt">
    <p class="max-w-5xl">
      <strong>Der Vermarktungsstart ist geplant für Herbst 2026.<br>Haben Sie Fragen? Gerne stehen wir Ihnen für ergänzende Auskünfte zur Verfügung.</strong>
    </p>
    <div class="pt-30 md:pt-50 flex gap-x-20 md:gap-x-40">
      <a href="https://sanjo.ch" title="Sanjo.ch" target="_blank" class="group">
        <x-icons.logo-sanjo class="w-169 md:w-[200px] h-auto group-hover:opacity-80 transition-all" />
      </a>
      <address class="not-italic">
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
      </address>
    </div>
  </x-layout.inner>
</x-layout.section>

<x-misc.map />

@endsection