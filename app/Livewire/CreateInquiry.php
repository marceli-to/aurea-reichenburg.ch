<?php

namespace App\Livewire;

use Livewire\Attributes\Rule;
use Livewire\Component;
use App\Models\Inquiry;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Session;

class CreateInquiry extends Component
{
    #[Rule('required')]
    public $firstname = '';

    #[Rule('required')]
    public $name = '';

    #[Rule('required')]
    public $street = '';

    #[Rule('required')]
    public $location = '';

    #[Rule('required|email')]
    public $email = '';

    public $phone = '';

    public $message = '';

    #[Rule('required|array|min:1')]
    public $apartment_types = [];

    #[Rule('accepted')]
    public $privacy = false;

    public $submitted = false;
    public $spamError = false;

    public function mount()
    {
        Session::put('form_loaded_at', now()->timestamp);
    }

    public function save()
    {
        // Time-based check: form must be open for at least 3 seconds
        $loadedAt = Session::get('form_loaded_at', 0);
        if (now()->timestamp - $loadedAt < 3) {
            $this->spamError = true;
            return;
        }

        // Rate limiting: max 5 submissions per IP per hour
        $ip = request()->ip();
        $key = 'inquiry-submit:' . $ip;
        
        if (RateLimiter::tooManyAttempts($key, 5)) {
            $this->spamError = true;
            return;
        }
        
        RateLimiter::hit($key, 3600); // 1 hour decay

        $this->validate();

        Inquiry::create([
            'firstname' => $this->firstname,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'street' => $this->street,
            'location' => $this->location,
            'apartment_type' => implode(', ', $this->apartment_types),
            'message' => $this->message,
        ]);

        $this->submitted = true;
        $this->dispatch('form-submitted');
    }

    public function render()
    {
        return view('livewire.create-inquiry');
    }
}
