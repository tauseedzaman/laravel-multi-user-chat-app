<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Contacts extends Component
{
    public function render()
    {
        return view('livewire.contacts',[
            'users' => User::latest()->get()
        ])->layout('layouts.main');
    }
}
