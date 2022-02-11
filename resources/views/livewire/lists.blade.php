<div>
    <ul wire:poll.keep-alive>
        @foreach ($users as $user)
        @if ($user->id != auth()->id())
            {{-- do nothing do not display my slef --}}
            <li class="bg-green-500 " style=" margin-top: 10px; ">
                <div class=" p-3 shadow bg-red-600 flex">
                    <div class=" flex flex-shrink">
                        <img class="w-20 h-20  " style="border-radius:50% " src="{{ $user->image }}" alt="" />
                    </div>
                    <p style="padding:30px"><b>{{ $user->name }}</b></p>
                    <a href="{{ route('chat_with', $user->uuid) }}" class="float-right ml-auto">
                        <x-button class="  ml-4 mt-4">
                            {{ __('Chat') }}
                        </x-button>
                    </a>
                </div>
            </li>
            @endif
        @endforeach
    </ul>
</div>
