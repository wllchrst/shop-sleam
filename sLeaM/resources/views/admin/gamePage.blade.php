@extends('template.admin_navbar')

@section('links')
    <link rel="stylesheet" href="{{ URL::asset('style/adminGame.css') }}">
    <style>
        .left-container img {
            width: 854px;
            height: 480px;
        }

        .search-container {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 2rem;
            flex-direction: column;
        }

        .search-container button {
            font-size: x-large;
            border: 1px solid white;
            background-color: transparent;
        }

        #search {
            font-size: x-large;
            margin-left: 1rem;
            background-color: transparent;
            border: none;
            border-bottom: 1px solid white;
        }

    </style>
@endsection

@section('content')
    <div class="game-container">
        <div class="search-container">
            <form action="{{ route('admin_search') }}" method="POST">
                @csrf
                <input type="text" name="search" id="search">
                <button type="submit">
                    Search
                </button>
            </form>
        </div>
        @foreach ($games as $game)
        <div class="image-container">
            <div class="left-container">
                <img src="{{ Storage::url($game->image_url) }}" alt="">
            </div>
            <div class="right-container">
                <h1>{{ $game->game_name }}</h1>
                <hr>
                <p>{{ $game->description }}</p>

                <h2 class="price">Price Rp. {{ $game->price }}</h2>

                <div class="button-container">
                    <form method="POST" action="{{ route('deleteGame', ['game_id' => $game->game_id ]) }} ">
                        @csrf
                        <button type="submit" class="delete-button">
                            Delete
                        </button>
                    </form>
                    <form action="{{ route('editPage', ['game_id' => $game->game_id]) }}">
                        @csrf
                        <button type="submit" class="edit-button">
                            Edit
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
        {{ $games->links() }}
@endsection
