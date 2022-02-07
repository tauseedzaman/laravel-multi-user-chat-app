<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Lists extends Component
{
    public function render()
    {
        return view('livewire.lists',[
            'users' => User::latest()->get()
        ]);
    }
}
