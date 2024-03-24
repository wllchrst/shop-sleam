@extends('template.member_navbar')

@section('links')
    <link rel="stylesheet" href="{{ URL::asset('style/library.css') }}">
@endsection

@section('content')
    <div class="mid-container">
        <h1>Hi, {{ $user->username }}</h1>
    </div>
    <div class="mid-container">
        @foreach ($games as $game)
            <div class="information-container">
                <div class="lefty">
                    <img src="{{ Storage::url($game->image_url) }}" alt="" class="game-image">
                </div>
                <div class="righty">
                    <h1 style="font-size: 40px">{{ $game->game_name }}</h1>
                    <p style="font-size: 25px">{{ $game->description }}</p>
                </div>
            </div>
        @endforeach
    </div>
@endsection
