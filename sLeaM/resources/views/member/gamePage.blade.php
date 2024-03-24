@extends('template.member_navbar')

@section('links')
    <link rel="stylesheet" href="{{ URL::asset('style/adminGame.css') }}">
@endsection

@section('content')
    <div class="game-container">
        @foreach ($games as $game)
        <div class="image-container">
            <div class="left-container">
                <img src="{{ Storage::url($game->image_url) }}" alt="" class="game-image">
            </div>
            <div class="right-container">
                <h1>{{ $game->game_name }}</h1>
                <hr>
                <p>{{ $game->description }}</p>

                <h2 class="price">Price Rp. {{ $game->price }}</h2>

                <div class="button-container">
                    @if (isset($ownedGames[$game->game_id]))
                        <h1>Owned</h1>
                    @else 
                        <form method="POST" action="{{ route('buyGame', ['game_id' => $game->game_id ]) }} ">
                            @csrf
                            <button type="submit" class="delete-button">
                                Buy
                            </button>
                        </form>  
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
        {{ $games->links('pagination::bootstrap-5') }}
@endsection
