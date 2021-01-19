<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Friendship extends Model
{
    use HasFactory;
    protected $table = 'friendship';

    public function user()
    {
        return $this->hasOne(User::class, 'user_id');
    }

    public function usersFriend()
    {
        return $this->hasOne(User::class, 'friend_id');
    }
}
