<div class="chat-body">
    <div class="chat-box-header">
        <svg class="employee" xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1"
            viewBox="0 0 24 24" width="512" height="512">
            <path
                d="m14.6 21.3c-.3.226-.619.464-.89.7h2.29a1 1 0 0 1 0 2h-4a1 1 0 0 1 -1-1c0-1.5 1.275-2.456 2.4-3.3.75-.562 1.6-1.2 1.6-1.7a1 1 0 0 0 -2 0 1 1 0 0 1 -2 0 3 3 0 0 1 6 0c0 1.5-1.275 2.456-2.4 3.3zm8.4-6.3a1 1 0 0 0 -1 1v3h-1a1 1 0 0 1 -1-1v-2a1 1 0 0 0 -2 0v2a3 3 0 0 0 3 3h1v2a1 1 0 0 0 2 0v-7a1 1 0 0 0 -1-1zm-10-3v-5a1 1 0 0 0 -2 0v4h-3a1 1 0 0 0 0 2h4a1 1 0 0 0 1-1zm10-10a1 1 0 0 0 -1 1v2.374a12 12 0 1 0 -14.364 17.808 1.015 1.015 0 0 0 .364.068 1 1 0 0 0 .364-1.932 10 10 0 1 1 12.272-14.318h-2.636a1 1 0 0 0 0 2h3a3 3 0 0 0 3-3v-3a1 1 0 0 0 -1-1z" />
        </svg>
        <div class="employee-name">Zee Chat</div>
        <div class="top-right-menu-icons">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path
                    d="M12,7a2,2,0,1,0-2-2A2,2,0,0,0,12,7Zm0,10a2,2,0,1,0,2,2A2,2,0,0,0,12,17Zm0-7a2,2,0,1,0,2,2A2,2,0,0,0,12,10Z" />
            </svg>
        </div>
        <div class="top-right-menu-last-icons" id="close-chat">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path
                    d="M18.71,8.21a1,1,0,0,0-1.42,0l-4.58,4.58a1,1,0,0,1-1.42,0L6.71,8.21a1,1,0,0,0-1.42,0,1,1,0,0,0,0,1.41l4.59,4.59a3,3,0,0,0,4.24,0l4.59-4.59A1,1,0,0,0,18.71,8.21Z" />
            </svg>
        </div>
    </div>
    <div class="chat-box-content">
        <div class="conversation-group">
            @forelse ($contacts as $user)
            @if ($user->user->id != auth()->id())
            <a href="{{  route('chat_with',$user->user->uuid) }}">
                <div class="contact">
                    <img class="contact_image" src="{{ $user->user->image }}" alt="" />
                    <p class="contact_name">{{ $user->user->name }}</p>
                    <div class="contact_last_chat_time">12:00</div>
                </div>
            </a>
            @endif
            @empty
            <center>no data found</center>
            @endforelse
        </div>
    </div>
</div>
