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

    public function newContact(): void
    {
        $this->validate();

        Contact::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
        ]);

        $this->dispatch('refreshContacts');

        $this->dispatch(
            'notification',
            icon: 'success',
            title: 'Contact created successfully!',
            position: 'center'
        );

        $this->reset();
    }

    public function render(): View
    {
        return view('livewire.form-contact');
    }
}
