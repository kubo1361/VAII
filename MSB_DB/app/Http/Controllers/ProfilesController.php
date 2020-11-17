<?php

namespace App\Http\Controllers;

use App\Models\User;

class ProfilesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(User $user)
    {
        return view('profiles.index', compact('user'));
    }
}
