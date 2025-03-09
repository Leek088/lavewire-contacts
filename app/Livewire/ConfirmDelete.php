<?php

namespace App\Livewire;

use App\Models\Contact;
use Illuminate\View\View;
use Livewire\Attributes\Title;
use Livewire\Component;
use Illuminate\Support\Facades\Crypt;
use Livewire\Features\SupportRedirects\Redirector;

class ConfirmDelete extends Component
{
    public Contact $contact;

    public function mount(string $id): void
    {
        $id = Crypt::decryptString($id);
        $this->contact = Contact::findOrFail($id);
    }

    public function cancel(): Redirector
    {
        return redirect()->route('home');
    }

    public function delete(): Redirector
    {
        $this->contact->delete();
        return redirect()->route('home');
    }

    #[Title('Delete Contact')]

    public function render(): View
    {
        return view('livewire.confirm-delete');
    }
}
