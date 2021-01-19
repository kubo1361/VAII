<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'is_admin',
        'enabled',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    // friendship that I started
    public function friendsOfMine()
    {
        return $this->belongsToMany(User::class, 'friendship', 'user_id', 'friend_id')
            ->wherePivot('accepted', '=', 1)
            ->withPivot('accepted')
    ;
    }

    public function acceptedFriendshipsOfMine()
    {
        return $this->hasMany(Friendship::class, 'user_id', )->where('accepted', '=', 1)
    ;
    }

    public function friendOf()
    {
        return $this->belongsToMany(User::class, 'friendship', 'friend_id', 'user_id')
            ->wherePivot('accepted', '=', 1)
            ->withPivot('accepted')
    ;
    }

    // friendship that I started
    public function invitesOfMine()
    {
        return $this->belongsToMany(User::class, 'friendship', 'user_id', 'friend_id')
            ->wherePivot('accepted', '=', 0)
            ->withPivot('accepted')
    ;
    }

    public function unnaceptedFriendshipInvitesOfMine()
    {
        return $this->hasMany(Friendship::class, 'user_id', )->where('accepted', '=', 0)
    ;
    }

    // friendship that I was invited to
    public function invitesOf()
    {
        return $this->belongsToMany(User::class, 'friendship', 'friend_id', 'user_id')
            ->wherePivot('accepted', '=', 0)
            ->withPivot('accepted')
    ;
    }

    // accessor allowing you call $user->friends
    public function getFriendsAttribute()
    {
        if (!array_key_exists('friendship', $this->relations)) {
            $this->loadFriends();
        }

        return $this->getRelation('friendship');
    }

    public function getFriendships()
    {
        return $this->belongsToMany(Friendship::class, 'friendship', 'user_id', 'friend_id')
            ->wherePivot('accepted', '=', 1)
            ->withPivot('accepted')
    ;
    }

    public function movies()
    {
        return $this->hasMany(Movie::class)->orderBy('updated_at', 'ASC');
    }

    public function series()
    {
        return $this->hasMany(Serie::class)->orderBy('updated_at', 'ASC');
    }

    public function books()
    {
        return $this->hasMany(Book::class)->orderBy('updated_at', 'ASC');
    }

    protected function loadFriends()
    {
        if (!array_key_exists('friendship', $this->relations)) {
            $friends = $this->mergeFriends();

            $this->setRelation('friendship', $friends);
        }
    }

    protected function mergeFriends()
    {
        return $this->friendsOfMine->merge($this->friendOf);
    }

    protected static function boot()
    {
        parent::boot();

        static::created(function ($user) {
            $user->profile()->create([
                'description' => 'No description',
                'image' => null,
            ]);
        });
    }
}
