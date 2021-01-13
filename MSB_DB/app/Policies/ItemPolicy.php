<?php

namespace App\Policies;

use App\Models\Book;
use App\Models\Movie;
use App\Models\Serie;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ItemPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @return mixed
     */
    public function viewAny(User $user)
    {
    }

    /**
     * Determine whether the user can view the model.
     *
     * @return mixed
     */
    public function view(User $user, Movie $movie)
    {
    }

    /**
     * Determine whether the user can create models.
     *
     * @return mixed
     */
    public function create(User $user)
    {
    }

    /**
     * Determine whether the user can update the model.
     *
     * @return mixed
     */
    public function updateMovie(User $user, Movie $movie)
    {
        return $user->id === $movie->user_id;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @return mixed
     */
    public function updateSerie(User $user, Serie $serie)
    {
        return $user->id === $serie->user_id;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @return mixed
     */
    public function updateBook(User $user, Book $book)
    {
        return $user->id === $book->user_id;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @return mixed
     */
    public function deleteMovie(User $user, Movie $movie)
    {
        return $user->id === $movie->user_id || $user->is_admin;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @return mixed
     */
    public function deleteSerie(User $user, Serie $serie)
    {
        return $user->id === $serie->user_id || $user->is_admin;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @return mixed
     */
    public function deleteBook(User $user, Book $book)
    {
        return $user->id === $book->user_id || $user->is_admin;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @return mixed
     */
    public function restore(User $user, Movie $movie)
    {
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @return mixed
     */
    public function forceDelete(User $user, Movie $movie)
    {
    }
}
