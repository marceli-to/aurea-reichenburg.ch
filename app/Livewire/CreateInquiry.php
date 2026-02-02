<?php

namespace App\Livewire;

use Livewire\Attributes\Rule;
use Livewire\Component;
use App\Models\Inquiry;

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

    public function save()
    {
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
    }

    public function render()
    {
        return view('livewire.create-inquiry');
    }
}
