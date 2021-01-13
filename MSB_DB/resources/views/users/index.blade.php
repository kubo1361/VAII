@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card-columns">
        @foreach($users as $user)
            <div class="card bg-light" style="width: 10rem;">
                <a href="{{ '/profile/' . $user->id }}" class=" text-secondary">
                    <img class="card-img-top" src="{{ $user->profile->profileImage() }}">
                </a>
                <div class="card-body">
                    <div class="card-text font-weight-bold text-black pb-1">
                        <a href="{{ '/profile/' . $user->id }}" class=" text-secondary">{{ $user->username }}</a>
                    </div>
                    <div class="card-text">{{ $user->profile->description }}</div>
                    @can('update', $user)
                        @if(!$user->is_admin)
                            @if($user->enabled)
                                <form name="disableUser" action="/users/{{ $user->id }}/d" enctype="multipart/form-data" method="POST">
                                @csrf
                                @method('PATCH')
                                <input type="submit" class="btn btn-outline-success btn-sm mt-2" value="Enabled">
                            @else
                                <form name="enableUser" action="/users/{{ $user->id }}/e" enctype="multipart/form-data" method="POST">
                                @csrf
                                @method('PATCH')
                                <input type="submit" class="btn btn-outline-danger btn-sm mt-2" value="Disabled">
                            @endif
                        @endif
                        </form>
                    @endcan
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection