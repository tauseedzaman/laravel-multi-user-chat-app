<?php

namespace App\Http\Livewire;

use App\Models\post;
use Livewire\Component;

class Posts extends Component
{
    public function render()
    {
        return view('livewire.posts');
    }
}
