<?php

namespace App\Livewire;

use App\Models\Contact;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Contacts extends Component
{
    use WithPagination;

    public string $search = '';

    #[On('refreshContacts')]
    public function refreshContacts(): void
    {
        // Este método será chamado quando o evento 'refreshContacts' for disparado
        // Não é necessário adicionar lógica aqui, pois o método render será chamado automaticamente
    }

    public function placeholder(): string
    {
        return <<<'HTML'
        <div>
            <span>Carregando....</span>
        </div>
        HTML;
    }

    public function render(): View
    {
        $contacts = Contact::query()
            ->where('name', 'like', '%' . $this->search . '%')
            ->orWhere('email', 'like', '%' . $this->search . '%')
            ->orWhere('phone', 'like', '%' . $this->search . '%')
            ->orderBy('id', 'desc')
            ->paginate(5);

        return view('livewire.contacts', [
            'contacts' => $contacts
        ]);
    }
}
