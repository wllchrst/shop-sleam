@extends('template.member_navbar')

@section('links')
    <link rel="stylesheet" href="{{ URL::asset('style/game-detail.css') }}">
@endsection

@section('content')
    <div class="middle-container">
        <div class="picture-container">
            <img src="{{ Storage::url($game->image_url) }}" alt="" class="game-image">
        </div>
        <div class="info-container">
            <div>
                <h1>{{ $game->game_name }}</h1>
                <p>{{ $game->description }}</p>
                <h2>Price  :  Rp. {{ $game->price }}</h2>
            </div>
            <div class="bottom-container">
                @if (isset($ownedGames[$game->game_id]))
                    Owned Games 
                @else
                    <form action="{{ route('buyGame', ['game_id' => $game->game_id ]) }}" method="POST">
                        @csrf
                        <button type="submit">Buy Game</button>
                    </form>
                @endif
            </div>
        </div>
    </div>
@endsection
