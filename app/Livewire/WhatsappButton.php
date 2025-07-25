<?php

namespace App\Livewire;

use Livewire\Component;

class WhatsappButton extends Component
{
    public $phoneNumber = '573001234567'; // Cambia por tu número
    public $message = 'Hola, necesito ayuda con Doritos Pizza';

    public function render()
    {
        return view('livewire.whatsapp-button');
    }
}
