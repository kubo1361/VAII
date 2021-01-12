<?php

namespace App\Http\Controllers;

use App\Models\User;

class FriendsController extends Controller
{
    public function index(User $user)
    {
        $friends = $user->friends;

        return view('friends.index', compact('friends'));
    }
}
