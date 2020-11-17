@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-2 pl-3">
            <img src="https://i.pinimg.com/originals/51/f6/fb/51f6fb256629fc755b8870c801092942.png" class="rounded-circle w-5">
        </div>
        <div class="col-10 pt-5 pl-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex align-items-center pb-3">
                    <div class="h4">USERNAME</div>
                </div>
            </div>
            <div class="d-flex">
                <div class='pr-3'><strong>5</strong> Alerts</div>
                <div class='pr-3'><strong>5</strong> Movies</div>
                <div class='pr-3'><strong>5</strong> Series</div>
                <div class='pr-3'><strong>5</strong> Books</div>
            </div>
            <div class="pt-4 font-weight-bold">Profile Title</div>
            <div>User Description</div>
        </div>
    </div>

    <hr>

    <div class="row pt-2 pb-4">
        <div class="col-3"><strong>NEWS</strong></div>
        <div class="col-3"><strong>MOVIES</strong></div>
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
            <div class="card bg-secondary">
                <img class="card-img-top"
                    src="https://s.studiobinder.com/wp-content/uploads/2017/12/Movie-Poster-Template-Dark-with-Image.jpg?x81279"
                    alt="Card image cap">
                <div class="card-body d-flex align-items-center">
                    <div class="card-text font-weight-bold pr-2" style="border-right:1px solid black">
                        <a href="#" class="stretched-link text-white">Generic Movie Name</a>
                    </div>
                    <div class="card-text font-weight-bold pl-2">100%</div>
                </div>
            </div>

            <div class="card bg-secondary">
                <img class="card-img-top"
                    src="https://s.studiobinder.com/wp-content/uploads/2017/12/Movie-Poster-Template-Dark-with-Image.jpg?x81279"
                    alt="Card image cap">
                <div class="card-body d-flex align-items-center">
                    <div class="card-text font-weight-bold pr-2" style="border-right:1px solid black">
                        <a href="#" class="stretched-link text-white">Generic Movie Name</a>
                    </div>
                    <div class="card-text font-weight-bold pl-2">100%</div>
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