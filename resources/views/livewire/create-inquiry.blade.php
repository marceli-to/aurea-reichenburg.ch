<div 
    x-data
    x-on:form-submitted.window="document.getElementById('anfrage').scrollIntoView({ behavior: 'smooth' })"
    x-on:validation-failed.window="document.getElementById('anfrage').scrollIntoView({ behavior: 'smooth' })"
>
    @if($submitted)
        <div>
            <p class="text-xl font-bold text-olive mb-10">Vielen Dank für Ihre Anfrage!</p>
            <p class="text-olive">Wir werden uns so schnell wie möglich bei Ihnen melden.</p>
        </div>
    @elseif($spamError)
        <div>
            <p class="text-xl font-bold text-oxblood mb-10">Ein Fehler ist aufgetreten.</p>
            <p class="text-olive">Bitte versuchen Sie es später erneut.</p>
        </div>
    @else
        <form wire:submit="save" class="space-y-20">
            <x-honeypot />

            {{-- Wohnungsgrösse Checkboxes --}}
            <div class="mb-30">
                <p class="text-md font-bold text-olive uppercase tracking-wider mb-16">Ich interessiere mich für (bitte auswählen):</p>
                <div class="space-y-12">
                    @foreach(['2.5-Zimmerwohnung', '3.5-Zimmerwohnung', '4.5-Zimmerwohnung', '5.5-Zimmerwohnung'] as $type)
                        <label class="flex items-center gap-12 cursor-pointer group">
                            <input 
                                type="checkbox" 
                                wire:model="apartment_types"
                                value="{{ $type }}"
                                class="w-18 h-18 border-olive/30 rounded text-olive focus:ring-2 focus:ring-olive"
                            >
                            <span class="text-md text-olive group-hover:text-oxblood transition-colors">{{ $type }}</span>
                        </label>
                    @endforeach
                </div>
                @error('apartment_types') <span class="text-oxblood text-sm mt-8 block">Bitte wählen Sie mindestens eine Wohnungsgrösse.</span> @enderror
            </div>
            
            <div class="grid md:grid-cols-2 gap-20">
                {{-- Vorname --}}
                <div>
                    <label for="firstname" class="block text-sm font-bold text-olive mb-8">Vorname *</label>
                    <input 
                        type="text" 
                        id="firstname" 
                        wire:model="firstname"
                        class="w-full px-12 py-8 border border-olive/30 rounded-none focus:border-olive focus:ring-1 focus:ring-olive bg-white text-olive placeholder-olive/50"
                    >
                    @error('firstname') <span class="text-oxblood text-sm mt-4 block">{{ $message }}</span> @enderror
                </div>

                {{-- Name --}}
                <div>
                    <label for="name" class="block text-sm font-bold text-olive mb-8">Name *</label>
                    <input 
                        type="text" 
                        id="name" 
                        wire:model="name"
                        class="w-full px-12 py-8 border border-olive/30 rounded-none focus:border-olive focus:ring-1 focus:ring-olive bg-white text-olive placeholder-olive/50"
                    >
                    @error('name') <span class="text-oxblood text-sm mt-4 block">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="grid md:grid-cols-2 gap-20">
                {{-- Strasse --}}
                <div>
                    <label for="street" class="block text-sm font-bold text-olive mb-8">Strasse/Nr. *</label>
                    <input 
                        type="text" 
                        id="street" 
                        wire:model="street"
                        class="w-full px-12 py-8 border border-olive/30 rounded-none focus:border-olive focus:ring-1 focus:ring-olive bg-white text-olive placeholder-olive/50"
                    >
                    @error('street') <span class="text-oxblood text-sm mt-4 block">{{ $message }}</span> @enderror
                </div>

                {{-- PLZ / Ort --}}
                <div>
                    <label for="location" class="block text-sm font-bold text-olive mb-8">PLZ/Ort *</label>
                    <input 
                        type="text" 
                        id="location" 
                        wire:model="location"
                        class="w-full px-12 py-8 border border-olive/30 rounded-none focus:border-olive focus:ring-1 focus:ring-olive bg-white text-olive placeholder-olive/50"
                    >
                    @error('location') <span class="text-oxblood text-sm mt-4 block">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="grid md:grid-cols-2 gap-20">
                {{-- E-Mail --}}
                <div>
                    <label for="email" class="block text-sm font-bold text-olive mb-8">E-Mail *</label>
                    <input 
                        type="email" 
                        id="email" 
                        wire:model="email"
                        class="w-full px-12 py-8 border border-olive/30 rounded-none focus:border-olive focus:ring-1 focus:ring-olive bg-white text-olive placeholder-olive/50"
                    >
                    @error('email') <span class="text-oxblood text-sm mt-4 block">{{ $message }}</span> @enderror
                </div>

                {{-- Telefon --}}
                <div>
                    <label for="phone" class="block text-sm font-bold text-olive mb-8">Telefon</label>
                    <input 
                        type="tel" 
                        id="phone" 
                        wire:model="phone"
                        class="w-full px-12 py-8 border border-olive/30 rounded-none focus:border-olive focus:ring-1 focus:ring-olive bg-white text-olive placeholder-olive/50"
                    >
                </div>
            </div>

            {{-- Bemerkungen --}}
            <div>
                <label for="message" class="block text-sm font-bold text-olive mb-8">Bemerkungen</label>
                <textarea 
                    id="message" 
                    wire:model="message"
                    rows="4"
                    class="w-full px-12 py-8 border border-olive/30 rounded-none focus:border-olive focus:ring-1 focus:ring-olive bg-white text-olive placeholder-olive/50 resize-none"
                ></textarea>
            </div>

            {{-- Datenschutz --}}
            <div class="flex items-center gap-12">
                <input 
                    type="checkbox" 
                    id="privacy" 
                    wire:model="privacy"
                    class="w-18 h-18 border-olive/30 rounded text-olive focus:ring-2 focus:ring-olive"
                >
                <label for="privacy" class="text-sm text-olive">
                    Ich habe die <a href="/datenschutz" target="_blank" class="underline hover:text-oxblood">Datenschutzerklärung</a> gelesen und akzeptiere diese.
                </label>
            </div>
            @error('privacy') <span class="text-oxblood text-sm block">{{ $message }}</span> @enderror

            {{-- Submit --}}
            <div class="pt-10">
                <button 
                    type="submit"
                    class="bg-olive text-white font-bold uppercase tracking-widest px-16 py-8 rounded-none hover:bg-olive/90 transition-all"
                    wire:loading.attr="disabled"
                    wire:loading.class="opacity-50 cursor-wait"
                >
                    <span wire:loading.remove>Absenden</span>
                    <span wire:loading>Wird gesendet...</span>
                </button>
            </div>
        </form>
    @endif
</div>
