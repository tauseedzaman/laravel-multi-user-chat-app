<?php

namespace App\Http\Livewire;

use App\Models\chat;
use App\Models\frinds;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;

class ChatWith extends Component
{

    public $uuid;
    public $user;
    public $message;


    public function send_message()
    {
        // dd(frinds::where(['user_id' => auth()->id(), 'friend_id' => $this->user->id])->count() === 0 || frinds::where(['user_id' => $this->user->id, 'friend_id' => auth()->id()])->count() === 0);
        $this->validate(['message' => "required"]);


        chat::create([
            'user_id' => auth()->id(),
            'message' => $this->message,
            'chat_id' => frinds::where(['user_id'=>auth()->id(), 'friend_id' =>$this->user->id])->first()->chat_id,
            'friend_id' => $this->user->id
        ]);

        $this->message='';
        $this->render();
    }

    public function mount($uuid)
    {
        $this->uuid = $uuid;
        $this->user = User::where('uuid',$uuid)->first();


        if (frinds::where(['user_id' => auth()->id(), 'friend_id' => $this->user->id])->count() === 0 || frinds::where(['user_id' => $this->user->id, 'friend_id' => auth()->id()])->count() === 0) {
            // if()
            $uuid = Str::uuid();
            frinds::create([
                'user_id' => auth()->id(),
                'chat_id' => $uuid,
                'friend_id' => $this->user->id
            ]);

            frinds::create([
                'user_id' => $this->user->id,
                'chat_id' => $uuid,
                'friend_id' => auth()->id()
            ]);
        }
    }
    public function render()
    {
        // dd((chat::where(['user_id' => auth()->id(),'friend_id' => $this->user->id])->Orwhere(['friend_id' => auth()->id(),'user_id' => $this->user->id])->get()));
        // dd(chat::where('chat_id',frinds::where(['user_id'=>auth()->id(), 'friend_id' =>$this->user->id])->first()->chat_id)->latest()->get());


        // dd(chat::where('chat_id','6f8e5f02-db67-446f-8364-8935e11788ac')->latest()->get());

        // dd(chat::where(['user_id' => auth()->id(),'friend_id' => $this->user->id,])->get());
        return view('livewire.chat-with',[
            // select the chat where my id maches to user id or friend id
            'messages' => chat::where('chat_id',frinds::where(['user_id'=>auth()->id(), 'friend_id' =>$this->user->id])->first()->chat_id)->get()
                    ])->layout('layouts.main');

    }
}
