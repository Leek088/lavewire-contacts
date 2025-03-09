<?php

namespace App\Livewire;

use App\Models\Contact;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Crypt;
use Livewire\Features\SupportRedirects\Redirector;

class EditContact extends Component
{
    public string $name;
    public string $email;
    public string $phone;

    public Contact $contact;

    public string $message_success;

    public function mount(string $id): void
    {
        $id = Crypt::decryptString($id);
        $this->contact = Contact::findOrFail($id);

        $this->name = $this->contact->name;
        $this->email = $this->contact->email;
        $this->phone = $this->contact->phone;
    }

    public function updateContact(): Redirector
    {
        $contact = Contact::findOrFail($this->contact->id);
        $this->validate();
        $contact->update(['name' => $this->name, 'email' => $this->email, 'phone' => $this->phone]);
        return redirect()->route('home');
    }

    protected function rules(): array
    {
        return [
            'name' => 'required|min:3|max:50|unique:contacts,name,' . $this->contact->id,
            'email' => 'required|email|max:50|unique:contacts,email,' . $this->contact->id,
            'phone' => 'required|max:20',
        ];
    }

    public function cancel(): Redirector
    {
        return redirect()->route('home');
    }

    public function render(): View
    {
        return view('livewire.edit-contact');
    }
}
