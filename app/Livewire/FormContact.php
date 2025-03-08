<?php

namespace App\Livewire;

use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;
use App\Models\Contact;

class FormContact extends Component
{
    #[Validate('required|min:3|max:50|unique:contacts,name')]
    public string $name;

    #[Validate('required|email|max:50|unique:contacts,email')]
    public string $email;

    #[Validate('required|max:20')]
    public string $phone;

    public string $message_success;
    public string $message_error;

    public function newContact(): void
    {
        $this->message_success = '';

        $this->validate();

        Contact::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
        ]);

        $this->dispatch('refreshContacts');

        $this->reset();

        $this->message_success = "Contact created successfully!";
    }

    public function render(): View
    {
        return view('livewire.form-contact');
    }
}
