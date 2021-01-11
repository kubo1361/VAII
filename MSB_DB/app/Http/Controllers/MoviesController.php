<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\User;
use Illuminate\Http\Request;

class MoviesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        $allMovies = Movie::whereIn('user_id', $user)->latest()->get();
        $allMoviesCount = $allMovies->count();

        $watchingMovies = $allMovies->where('state', 'Watching');
        $watchingMoviesCount = $watchingMovies->count();

        $ptwMovies = $allMovies->where('state', 'Plan to watch');
        $ptwMoviesCount = $ptwMovies->count();

        $completedMovies = $allMovies->where('state', 'Completed');
        $completedMoviesCount = $completedMovies->count();

        $droppedMovies = $allMovies->where('state', 'Dropped');
        $droppedMoviesCount = $droppedMovies->count();

        return view('items.movies.index', compact(
            'user',
            'allMovies',
            'allMoviesCount',
            'watchingMovies',
            'watchingMoviesCount',
            'ptwMovies',
            'ptwMoviesCount',
            'completedMovies',
            'completedMoviesCount',
            'droppedMovies',
            'droppedMoviesCount'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('items.movies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $validatedData = $request->validate([
            'name' => 'required|unique:movies',
            'rating' => 'required|numeric|max:100',
            'state' => 'required|in:Watching,Plan to watch,Completed,Dropped',
            'comment' => '',
            'image' => 'image',
        ]);

        if (isset($validatedData['image'])) {
            $imagePath = $validatedData['image']->store('uploads.movies', 'public');
            $validatedData['image'] = '/storage/'.$imagePath;
        } else {
            $validatedData['image'] = '/storage/default/default_movie_poster.jpg';
        }

        auth()->user()->movies()->create($validatedData);

        return redirect('/profile/'.auth()->user()->id);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        return view('items.movies.show', compact('movie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        $movie->delete();

        return redirect('/profile/'.auth()->user()->id);
    }
}
