<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class chat extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'message',
        'chat_id',
        'friend_id'
    ];

    /**
     * Get the user that owns the chat
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
