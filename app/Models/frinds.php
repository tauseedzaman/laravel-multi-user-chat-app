<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class frinds extends Model
{
    use HasFactory;
    protected $table='friend';
    protected $fillable=[
        'user_id',
        'chat_id',
        'friend_id'
    ];


    /**
     * Get the user that owns the frinds
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
