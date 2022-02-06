<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class frinds extends Model
{
    use HasFactory;
    protected $table='friend_user';
    protected $fillable=[
        'user_id',
        'frind_id'
    ];
}
