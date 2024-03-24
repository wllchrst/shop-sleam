
@extends('template.member_navbar')

@section('links')
    <link rel="stylesheet" href="{{ URL::asset('style/member-dash.css') }}"> 
    <style>
        .games-container img {
            width: 640px;
            height: 360px;
        }
    </style>
@endsection
@section('content')
    <div class="dash-container">
        <div>
            <div class="search-container">
                <h1>Hot Games</h1>
                <form action="{{ route('search') }}" method="POST">
                    @csrf
                    <input type="text" name="search" id="search">
                    <button type="submit">
                        Search
                    </button>
                </form>
            </div>
            <div class="games-container">
                @foreach ($games as $game)
                    <form action="{{ route('gameDetailPage', ['game_id' => $game->game_id]) }}">
                        @csrf
                        <button type="submit">
                            <img src="{{ Storage::url($game->image_url) }}" alt="" class="games-image">
                        </button>
                    </form>
                @endforeach
            </div>
            </div>
        </div>
    </div>
@endsection
