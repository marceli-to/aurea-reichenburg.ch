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

    #[Rule('required')]
    public $apartment_type = '';

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
            'apartment_type' => $this->apartment_type,
            'message' => $this->message,
        ]);

        $this->submitted = true;
    }

    public function render()
    {
        return view('livewire.create-inquiry');
    }
}
