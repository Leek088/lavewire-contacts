<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;
use Illuminate\View\View;

class MainComponent extends Component
{
    #[Title("Livewire Contacts")]
    public function render(): View
    {
        return view('livewire.main-component');
    }
}
