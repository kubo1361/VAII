<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\User;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    public function index(User $user)
    {
        $movies = Movie::whereIn('user_id', $user)->latest()->paginate(15);

        $moviesCount = $user->movies->count();
        $seriesCount = $user->series->count();
        $booksCount = $user->books->count();

        return view('profiles.index', compact('user', 'moviesCount', 'seriesCount', 'booksCount', 'movies'));
    }

    public function edit(User $user)
    {
        //$this->authorize('update', $user->profile);

        return view('profiles.edit', compact('user'));
    }

    public function update(User $user)
    {
        //$this->authorize('update', $user->profile);

        $validatedData = request()->validate([
            'description' => 'required',
            'image' => 'image',
        ]);

        if (isset($validatedData['image'])) {
            $imagePath = $validatedData['image']->store('profile', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(500, 500);
            $image->save();
            $validatedData['image'] = $imagePath;
        }

        auth()->user()->profile->update($validatedData);

        return redirect("/profile/{$user->id}");
    }
}
