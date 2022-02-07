<?php

namespace App\Http\Livewire;

use App\Models\chat;
use App\Models\frinds;
use App\Models\User;
use Livewire\Component;

class ChatWith extends Component
{

    public $uuid;
    public $user;
    public $message;


    public function send_message()
    {
        $this->validate(['message' => "required"]);
        chat::create([
            'user_id' => auth()->id(),
            'message' => $this->message,
            'friend_id' => $this->user->id
        ]);

        if (frinds::where(['user_id' => auth()->id(), 'friend_id' => $this->user->id])->count() == 0 || frinds::where(['user_id' => $this->user->id, 'friend_id' => auth()->id()])->count() == 0  ) {
            frinds::create([
                'user_id' => auth()->id(),
                'friend_id' => $this->user->id
            ]);
        }
        $this->message='';
        $this->render();
    }

    public function mount($uuid)
    {
        $this->uuid = $uuid;
        $this->user = User::where('uuid',$uuid)->first();
    }
    public function render()
    {
        // dd((chat::where(['user_id' => auth()->id(),'friend_id' => $this->user->id])->Orwhere(['friend_id' => auth()->id(),'user_id' => $this->user->id])->get()));



        return view('livewire.chat-with',[
            // select the chat where my id maches to user id or friend id
            'messages' =>chat::
            where([
                'user_id' => auth()->id(),
                'friend_id' => $this->user->id,
                ])->get()
                    ])->layout('layouts.main');

    }
}
