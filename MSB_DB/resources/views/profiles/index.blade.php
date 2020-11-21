@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-1 pl-3 d-flex align-items-center">
            <img src="{{$user->profile->profileImage()}}" class="rounded-circle w-100">
        </div>
        <div class="col-11 pt-5 pl-3">
            <div class="d-flex justify-content-start align-items-start">
                <div class="h4 vl-r pr-2">{{ $user->username }}</div>
                <div class="pl-2">
                    <a href="/profile/{{$user->id}}/edit"> 
                        <img src="/storage/default/edit-black-18dp.svg">
                    </a>
                </div>
            </div>
            <div class="d-flex">
                <div class='pr-3'><strong>{{ $moviesCount }}</strong> Movies</div>
                <div class='pr-3'><strong>{{ $seriesCount }}</strong> Series</div>
                <div class='pr-3'><strong>{{ $booksCount }}</strong> Books</div>
                <div class='pr-3'><strong>-</strong></div>
                <div class='pr-3'><strong> 5</strong> New alerts</div>
            </div>
            <hr>
            <div>{{ $user->profile->description }}</div>
        </div>
    </div>

    <hr>

    <div class="row pt-2 pb-4">
        <div class="col-3"><strong>NEWS</strong></div>
        <div class="col-3 d-flex align-items-start justify-content-start">
            <div class="font-weight-bold vl-r pr-1">MOVIES</div>
            <div class="pl-1">
                <a href="/m/create"> 
                    <img src="/storage/default/library_add-black-18dp.svg">
                </a>
            </div>
         </div>
        <div class="col-3"><strong>SERIES</strong></div>
        <div class="col-3"><strong>BOOKS</strong></div>
    </div>

    <div class="row">
        <div class="col-3 vl-r">

            <div class="row pb-1">
                <div class="col">
                    <div class="card bg-light" style="width: max-width;">
                        <div class="card-body">
                            <h4 class="card-title">Some title</h4>
                            <p class="card-text">Was added, removed, etc..</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-3 card-columns vl-r">
            @foreach($movies as $movie)

            <div class="card bg-secondary">
                <img class="card-img-top"
                    src="{{ $movie->image }}">
                <div class="card-body d-flex align-items-center">
                    <div class="card-text font-weight-bold pr-2" style="border-right:1px solid black">
                        <a href="/m/{{ $movie->id }}" class="stretched-link text-white">{{ $movie->name }}</a>
                    </div>
                    <div class="card-text font-weight-bold pl-2">{{ $movie->rating }}%</div>
                </div>
            </div>

            @endforeach
            <hr>
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    {{ $movies->links() }}
                </div>
            </div>
        </div>

        <div class="col-3 card-columns vl-r">
            <div class="card">
                <img class="card-img-top"
                    src="https://s.studiobinder.com/wp-content/uploads/2017/12/Movie-Poster-Template-Dark-with-Image.jpg?x81279"
                    alt="Card image cap">
                <div class="card-body d-flex align-items-center">
                    <div class="card-text font-weight-bold pr-2" style="border-right:1px solid black">Generic
                        Movie
                        Name</div>
                    <div class="card-text font-weight-bold pl-2">100%</div>
                </div>
            </div>

            <div class="card">
                <img class="card-img-top"
                    src="https://s.studiobinder.com/wp-content/uploads/2017/12/Movie-Poster-Template-Dark-with-Image.jpg?x81279"
                    alt="Card image cap">
                <div class="card-body d-flex align-items-center">
                    <div class="card-text font-weight-bold pr-2" style="border-right:1px solid black">Generic
                        Movie
                        Name</div>
                    <div class="card-text font-weight-bold pl-2">100%</div>
                </div>
            </div>
        </div>

        <div class="col-3 card-columns">
            <div class="card">
                <img class="card-img-top"
                    src="https://s.studiobinder.com/wp-content/uploads/2017/12/Movie-Poster-Template-Dark-with-Image.jpg?x81279"
                    alt="Card image cap">
                <div class="card-body d-flex align-items-center">
                    <div class="card-text font-weight-bold pr-2" style="border-right:1px solid black">Generic
                        Movie
                        Name</div>
                    <div class="card-text font-weight-bold pl-2">100%</div>
                </div>
            </div>

            <div class="card">
                <img class="card-img-top"
                    src="https://s.studiobinder.com/wp-content/uploads/2017/12/Movie-Poster-Template-Dark-with-Image.jpg?x81279"
                    alt="Card image cap">
                <div class="card-body d-flex align-items-center">
                    <div class="card-text font-weight-bold pr-2" style="border-right:1px solid black">Generic
                        Movie
                        Name</div>
                    <div class="card-text font-weight-bold pl-2">100%</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection