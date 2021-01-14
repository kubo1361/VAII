@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card-decks pt-3">
        <div class="card bg-light" style="width: 10rem;">
            <div class="card-body">
                <div class="card-text font-weight-bold text-black pl-3">
                    <div id="ReactCheckbox" isChecked="{{ $user->private }}" userId="{{ $user->id }}" text="Private profile"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection