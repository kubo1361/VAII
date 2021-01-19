<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index(User $user)
    {
        return view('settings.index', compact('user'));
    }

    public function private(User $user, Request $request)
    {
        if ($request->has('private')) {
            $user->private = $request->boolean('private');
            $user->save();

            return ['private' => boolval($user->private)];
        }
    }
}
