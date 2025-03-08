<?php

namespace App\Livewire;

use App\Models\Contact;
use Illuminate\View\View;
use Illuminate\Support\Collection;
use Livewire\Attributes\On;
use Livewire\Component;

class Contacts extends Component
{
    public Collection $contacts;

    public function mount(): void
    {
        $this->contacts = $this->getContacts();
    }

    #[On('refreshContacts')]
    public function refreshContacts(): void
    {
        $this->contacts = $this->getContacts();
    }

    private function getContacts(): Collection
    {
        return $this->contacts = Contact::orderBy('id', 'desc')->get();
    }

    public function render(): View
    {
        return view('livewire.contacts');
    }
}
