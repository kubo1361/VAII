@extends('layouts.app')

@section('content')
<div class="container">
    <ul class="nav nav-pills" role="tablist">
        <li class="nav-item active" role="presentation">
            <a class="nav-link active mr-2" data-toggle="pill" role="pil" aria-selected="true" href="#all-movies">ALL</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link mr-2" data-toggle="pill" role="pil" aria-selected="false" href="#watching-movies">WATCHING</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link mr-2" data-toggle="pill" role="pil" aria-selected="false" href="#ptw-movies">PLAN TO WATCH</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link mr-2" data-toggle="pill" role="pil" aria-selected="false" href="#completed-movies">COMPLETED</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link mr-2" data-toggle="pill" role="pil" aria-selected="false" href="#dropped-movies">DROPPED</a>
        </li>
        <li class="d-flex align-items-center">
            <a href="/m/create"> 
                <i class="material-icons md-24 md-dark pt-2">add</i>
            </a>
        </li>
    </ul>

    <div class="tab-content">
        <div id="all-movies" class="tab-pane fade show active">
            <div class="font-weight-bold pt-1 pb-1">All movies: {{ $allMoviesCount }}</div>
            <div class="card-columns">
                @foreach($allMovies as $movie)
                    <div class="card bg-secondary" style="max-width: 16rem;">
                        <img class="card-img-top" src="{{ $movie->image }}">
                        <div class="card-body d-flex align-items-center">
                            <div class="card-text font-weight-bold pr-2" style="border-right:1px solid black">
                                <a href="/m/{{ $movie->id }}" class="stretched-link text-white">{{ $movie->name }}</a>
                            </div>
                            <div class="card-text font-weight-bold pl-2">{{ $movie->rating }}%</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div id="watching-movies" class="tab-pane fade">
            <div class="font-weight-bold pt-1 pb-1">Currently watching: {{ $watchingMoviesCount }}</div>
            <div class="card-columns">
                @foreach($watchingMovies as $movie)
                <div class="card bg-secondary" style="max-width: 16rem;">
                    <img class="card-img-top" src="{{ $movie->image }}">
                    <div class="card-body d-flex align-items-center">
                        <div class="card-text font-weight-bold pr-2" style="border-right:1px solid black">
                            <a href="/m/{{ $movie->id }}" class="stretched-link text-white">{{ $movie->name }}</a>
                        </div>
                        <div class="card-text font-weight-bold pl-2">{{ $movie->rating }}%</div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div id="ptw-movies" class="tab-pane fade">
            <div class="font-weight-bold pt-1 pb-1">Plan to watch: {{ $ptwMoviesCount }}</div>
            <div class="card-columns">
                @foreach($ptwMovies as $movie)
                <div class="card bg-secondary" style="max-width: 16rem;">
                    <img class="card-img-top" src="{{ $movie->image }}">
                    <div class="card-body d-flex align-items-center">
                        <div class="card-text font-weight-bold pr-2" style="border-right:1px solid black">
                            <a href="/m/{{ $movie->id }}" class="stretched-link text-white">{{ $movie->name }}</a>
                        </div>
                        <div class="card-text font-weight-bold pl-2">{{ $movie->rating }}%</div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div id="completed-movies" class="tab-pane fade">
            <div class="font-weight-bold pt-1 pb-1">Completed: {{ $completedMoviesCount }}</div>
            <div class="card-columns">
                @foreach($completedMovies as $movie)
                <div class="card bg-secondary" style="max-width: 16rem;">
                    <img class="card-img-top" src="{{ $movie->image }}">
                    <div class="card-body d-flex align-items-center">
                        <div class="card-text font-weight-bold pr-2" style="border-right:1px solid black">
                            <a href="/m/{{ $movie->id }}" class="stretched-link text-white">{{ $movie->name }}</a>
                        </div>
                        <div class="card-text font-weight-bold pl-2">{{ $movie->rating }}%</div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div id="dropped-movies" class="tab-pane fade">
            <div class="font-weight-bold pt-1 pb-1">Dropped: {{ $droppedMoviesCount }}</div>
            <div class="card-columns">
                @foreach($droppedMovies as $movie)
                <div class="card bg-secondary" style="max-width: 16rem;">
                    <img class="card-img-top" src="{{ $movie->image }}">
                    <div class="card-body d-flex align-items-center">
                        <div class="card-text font-weight-bold pr-2" style="border-right:1px solid black">
                            <a href="/m/{{ $movie->id }}" class="stretched-link text-white">{{ $movie->name }}</a>
                        </div>
                        <div class="card-text font-weight-bold pl-2">{{ $movie->rating }}%</div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

    </div>

</div>
@endsection