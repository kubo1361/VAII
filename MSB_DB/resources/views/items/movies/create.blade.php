@extends('layouts.app')

@section('content')
<div class="container">

    <form action="/m" enctype="multipart/form-data" method="POST">
    @csrf

    <div class="row">
        <div class="col-8 offset-2">

            <div class="row">
                <h1>Add New Movie</h1>
            </div>

            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label">Name of the Movie</label>
                    <input id="name"
                    type="text" class="form-control @error('name') is-invalid @enderror" 
                    name="name"
                    value="{{ old('name') }}" 
                    autocomplete="name" autofocus>

                    @error('name')
                        <strong>{{ $message }}</strong>
                    @enderror
            </div>

            <div class="form-group row">
                <label for="state" class="col-md-4 col-form-label">State</label>
                    <select class="form-control" id="state" name="state">
                        <option value="Watching" selected>Watching</option>
                        <option value="Plan to watch">Plan to watch</option>
                        <option value="Completed">Completed</option>
                        <option value="Dropped">Dropped</option>
                    </select>
            </div>

            <div class="form-group row">
                <label for="rating" class="col-md-4 col-form-label">Rating</label>
                    <input id="rating"
                    type="text" class="form-control @error('rating') is-invalid @enderror" 
                    name="rating"
                    value="{{ old('rating') }}" 
                    autocomplete="rating" autofocus>

                    @error('rating')
                        <strong>{{ $message }}</strong>
                    @enderror
            </div>

            <div class="form-group row">
                <label for="comment" class="col-md-4 col-form-label">Comment</label>
                    <input id="comment"
                    type="text" class="form-control @error('comment') is-invalid @enderror" 
                    name="comment"
                    value="{{ old('comment') }}" 
                    autocomplete="comment" autofocus>

                    @error('comment')
                        <strong>{{ $message }}</strong>
                    @enderror
            </div>

            <div class="row">
                    <label for="image" class="col-md-4 col-form-label">Movie Image</label>
                <input type="file", class="form-control-file" id="image" name="image">
                @error('image')
                    <strong>{{ $message }}</strong>
                @enderror
            </div>

            <div class="row pt-4">
                <button class="btn btn-primary"> Add new Movie </button>
            </div>
        </div>
    </div>
    </form>
</div>
@endsection