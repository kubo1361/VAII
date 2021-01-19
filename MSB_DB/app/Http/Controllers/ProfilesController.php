<?php

namespace App\Http\Controllers;

use App\Models\Friendship;
use App\Models\Movie;
use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    public function index(User $user)
    {
        $this->authorize('view', $user->profile);
        $movies = Movie::where('user_id', '=', $user->id)->latest()->get();

        $friendshipStatus = $this->friendStatus($user);

        $moviesCount = $user->movies->count();
        $seriesCount = $user->series->count();
        $booksCount = $user->books->count();

        return view('profiles.index', compact('user', 'moviesCount', 'seriesCount', 'booksCount', 'movies', 'friendshipStatus'));
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user->profile);

        return view('profiles.edit', compact('user'));
    }

    public function update(User $user)
    {
        $this->authorize('update', $user->profile);

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

        return redirect()->route('profile.show', ['user' => auth()->user()->id]);
    }

    public function addOrRemoveFriend(User $user, Request $request)
    {
        $authUser = auth()->user();

        if (1 == $request->status) {
            $friends = $authUser->acceptedFriendshipsOfMine;
            foreach ($friends as $friend) {
                if ($friend->friend_id == $user->id) {
                    $friend->delete();

                    return ['status' => -1];
                }
            }
        } elseif (0 == $request->status) {
            $invites = $authUser->unnaceptedFriendshipInvitesOfMine;
            foreach ($invites as $invite) {
                if ($invite->friend_id == $user->id) {
                    $invite->accepted = 1;
                    $invite->last_change_by = $user->id;
                    $invite->save();

                    return ['status' => 1];
                }
            }
        } else {
            $friendship = new Friendship();
            $friendship->user_id = auth()->user()->id;
            $friendship->friend_id = $user->id;
            $friendship->accepted = 0;
            $friendship->last_change_by = auth()->user()->id;
            $friendship->save();

            return ['status' => 0];
        }
    }

    public function friendStatus(User $friendUser)
    {
        $myUser = auth()->user();
        $friendships = $myUser->friendsOfMine
            ->where('id', $friendUser->id)
        ;
        $invites = $myUser->invitesOfMine
            ->where('id', $friendUser->id)
        ;

        if (!$friendships->isEmpty()) {
            return 1;
        }
        if (!$invites->isEmpty()) {
            return 0;
        }

        return -1;
    }
}
