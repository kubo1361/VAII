@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-2 pl-3 d-flex align-items-center">
            <img src="{{ $user->profile->profileImage() }}" class="nonimportant rounded-circle w-100">
        </div>
        <div class="col-sm-10 pt-1 pl-3">
            <div class="d-flex justify-content-start align-items-start">
                <div class="h4 vl-r pr-2">{{ $user->username }}</div>
                <div class="pl-2">
                    <a href="/profile/{{$user->id}}/edit"> 
                        <i class="material-icons md-18 md-dark mt-1">edit</i>
                    </a>
                </div>
            </div>
            <div class="d-flex">
                <div class='pr-3'><strong>{{ $moviesCount }}</strong> Movies</div>
                <div class='pr-3'><strong>{{ $seriesCount }}</strong> Series</div>
                <div class='pr-3'><strong>{{ $booksCount }}</strong> Books</div>
            </div>
            <hr>
            <div>{{ $user->profile->description }}</div>
        </div>
    </div>

    <hr>

    <div class="row pl-3 pt-2">
        <div class="font-weight-bold">NEWS</div>
    </div>

    <div class="row">
        <div class="col-sm-3">
            <div class="card bg-light" style="width: max-width;">
                <div class="card-body">
                    <h4 class="card-title">Some title</h4>
                    <p class="card-text">Was added, removed, etc..</p>
                </div>
            </div>
        </div>
    </div>


    <div class="row pl-3 pt-4 d-flex align-items-center">
        <div class="font-weight-bold pr-2">MOVIES</div>
        <div class="pl-2 vl-l">
            <a href="/m/create"> 
                <i class="material-icons md-18 md-dark mt-1">add</i>
            </a>
        </div>
    </div>

    <div class="row pt-1 d-flex flex-row flex-nowrap overflow-auto">
        @foreach($movies as $movie)
        <div class="col">
            <div class="card bg-secondary" style="width: 10rem;">
                <img class="card-img-top" src="{{ $movie->image }}">
                <div class="card-body d-flex align-items-center">
                    <div class="card-text font-weight-bold pr-2" style="border-right:1px solid black">
                        <a href="/m/{{ $movie->id }}" class="stretched-link text-white">{{ $movie->name }}</a>
                    </div>
                    <div class="card-text font-weight-bold pl-2">{{ $movie->rating }}%</div>
                </div>
            </div>
        </div>
        @endforeach
    </div>


    <div class="row pl-3 pt-4 d-flex align-items-center">
        <div class="font-weight-bold pr-2">SERIES</div>
        <div class="pl-2 vl-l">
            <a href="/m/create"> 
                <i class="material-icons md-18 md-dark mt-1">add</i>
            </a>
        </div>
    </div>

    <div class="row pt-1 d-flex flex-row flex-nowrap overflow-auto">
        <div class="col">
        
        </div>
    </div>


    <div class="row pl-3 pt-4 d-flex align-items-center">
        <div class="font-weight-bold pr-2">BOOKS</div>
        <div class="pl-2 vl-l">
            <a href="/m/create"> 
                <i class="material-icons md-18 md-dark mt-1">add</i>
            </a>
        </div>
    </div>

    <div class="row pt-1 d-flex flex-row flex-nowrap overflow-auto">
        <div class="col">
            
        </div>
</div>
@endsection