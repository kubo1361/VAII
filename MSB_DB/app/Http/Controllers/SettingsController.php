<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        return view('settings.index', compact('user'));
    }

    public function private(User $user, Request $request)
    {
        dump($user);
        dump($request);
        //if ($request->has('private')) {
        $value = $request->boolean('private');
        $user->update(['private' => (int) $value]);
        dump($value);

        return ['private' => boolval($user->private)];
        //}
    }
}
