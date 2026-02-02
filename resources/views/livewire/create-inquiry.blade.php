<div>
    @if($submitted)
        <div class="bg-sand/20 border border-sand rounded-lg p-30 text-center">
            <p class="text-xl font-bold text-olive mb-10">Vielen Dank für Ihre Anfrage!</p>
            <p class="text-olive">Wir werden uns so schnell wie möglich bei Ihnen melden.</p>
        </div>
    @else
        <form wire:submit="save" class="space-y-20">
            <x-honeypot />
            
            <div class="grid md:grid-cols-2 gap-20">
                {{-- Vorname --}}
                <div>
                    <label for="firstname" class="block text-sm font-bold text-olive mb-8">Vorname *</label>
                    <input 
                        type="text" 
                        id="firstname" 
                        wire:model="firstname"
                        class="w-full px-16 py-12 border border-olive/30 rounded-md focus:border-olive focus:ring-1 focus:ring-olive bg-white text-olive placeholder-olive/50"
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
                        class="w-full px-16 py-12 border border-olive/30 rounded-md focus:border-olive focus:ring-1 focus:ring-olive bg-white text-olive placeholder-olive/50"
                    >
                    @error('name') <span class="text-oxblood text-sm mt-4 block">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="grid md:grid-cols-2 gap-20">
                {{-- Strasse --}}
                <div>
                    <label for="street" class="block text-sm font-bold text-olive mb-8">Strasse *</label>
                    <input 
                        type="text" 
                        id="street" 
                        wire:model="street"
                        class="w-full px-16 py-12 border border-olive/30 rounded-md focus:border-olive focus:ring-1 focus:ring-olive bg-white text-olive placeholder-olive/50"
                    >
                    @error('street') <span class="text-oxblood text-sm mt-4 block">{{ $message }}</span> @enderror
                </div>

                {{-- PLZ / Ort --}}
                <div>
                    <label for="location" class="block text-sm font-bold text-olive mb-8">PLZ / Ort *</label>
                    <input 
                        type="text" 
                        id="location" 
                        wire:model="location"
                        class="w-full px-16 py-12 border border-olive/30 rounded-md focus:border-olive focus:ring-1 focus:ring-olive bg-white text-olive placeholder-olive/50"
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
                        class="w-full px-16 py-12 border border-olive/30 rounded-md focus:border-olive focus:ring-1 focus:ring-olive bg-white text-olive placeholder-olive/50"
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
                        class="w-full px-16 py-12 border border-olive/30 rounded-md focus:border-olive focus:ring-1 focus:ring-olive bg-white text-olive placeholder-olive/50"
                    >
                </div>
            </div>

            {{-- Wohnungsgrösse --}}
            <div>
                <label for="apartment_type" class="block text-sm font-bold text-olive mb-8">Gewünschte Wohnungsgrösse *</label>
                <select 
                    id="apartment_type" 
                    wire:model="apartment_type"
                    class="w-full px-16 py-12 border border-olive/30 rounded-md focus:border-olive focus:ring-1 focus:ring-olive bg-white text-olive"
                >
                    <option value="">Bitte wählen...</option>
                    <option value="2.5-Zimmerwohnung">2.5-Zimmerwohnung</option>
                    <option value="3.5-Zimmerwohnung">3.5-Zimmerwohnung</option>
                    <option value="4.5-Zimmerwohnung">4.5-Zimmerwohnung</option>
                    <option value="5.5-Zimmerwohnung">5.5-Zimmerwohnung</option>
                </select>
                @error('apartment_type') <span class="text-oxblood text-sm mt-4 block">{{ $message }}</span> @enderror
            </div>

            {{-- Nachricht --}}
            <div>
                <label for="message" class="block text-sm font-bold text-olive mb-8">Nachricht</label>
                <textarea 
                    id="message" 
                    wire:model="message"
                    rows="4"
                    class="w-full px-16 py-12 border border-olive/30 rounded-md focus:border-olive focus:ring-1 focus:ring-olive bg-white text-olive placeholder-olive/50 resize-none"
                ></textarea>
            </div>

            {{-- Datenschutz --}}
            <div class="flex items-start gap-12">
                <input 
                    type="checkbox" 
                    id="privacy" 
                    wire:model="privacy"
                    class="mt-4 w-18 h-18 border-olive/30 rounded text-olive focus:ring-olive"
                >
                <label for="privacy" class="text-sm text-olive">
                    Ich habe die <a href="/datenschutz" target="_blank" class="underline hover:text-oxblood">Datenschutzerklärung</a> gelesen und akzeptiere diese. *
                </label>
            </div>
            @error('privacy') <span class="text-oxblood text-sm block">{{ $message }}</span> @enderror

            {{-- Submit --}}
            <div class="pt-10">
                <button 
                    type="submit"
                    class="bg-oxblood text-white font-bold uppercase tracking-widest px-30 py-14 rounded-md hover:bg-oxblood/90 transition-all"
                    wire:loading.attr="disabled"
                    wire:loading.class="opacity-50 cursor-wait"
                >
                    <span wire:loading.remove>Anfrage senden</span>
                    <span wire:loading>Wird gesendet...</span>
                </button>
            </div>
        </form>
    @endif
</div>
