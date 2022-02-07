<?php

namespace App\Http\Livewire;

use App\Models\chat;
use App\Models\frinds;
use App\Models\User;
use Livewire\Component;

class Contacts extends Component
{
    public function render()
    {
        // dd(frinds::where('user_id', auth()->id())->orwhere('friend_id', auth()->id())->get());
        return view('livewire.contacts',[
            'contacts' => frinds::where(['user_id'=> auth()->id()])->orwhere("friend_id",auth()->id())->get()
        ])->layout('layouts.main');
    }
}
