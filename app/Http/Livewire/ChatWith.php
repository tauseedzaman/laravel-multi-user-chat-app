<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class ChatWith extends Component
{

    public $uuid;

    public function mount($uuid)
    {
        $this->uuid = $uuid;
    }
    public function render()
    {
        return view('livewire.chat-with',[
            'user' => User::where('uuid',$this->uuid)->first()
        ])->layout('layouts.main');
    }
}
