<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;

class UsersController extends Controller
{
    public function index()
    {
        if (Gate::allows('isAdmin', auth()->user())) {
            $users = User::all();
        } else {
            $users = User::all()->where('enabled', true);
        }

        return view('users.index', compact('users'));
    }

    public function disable(User $user)
    {
        if (Gate::allows('isAdmin', auth()->user())) {
            $user->update(['enabled' => false]);
            $users = User::all();
        } else {
            $users = User::all()->where('enabled', true);
        }

        return view('users.index', compact('users'));
    }

    public function enable(User $user)
    {
        if (Gate::allows('isAdmin', auth()->user())) {
            $user->update(['enabled' => true]);
            $users = User::all();
        } else {
            $users = User::all()->where('enabled', true);
        }

        return view('users.index', compact('users'));
    }
}
