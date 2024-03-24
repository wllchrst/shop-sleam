@extends('template.admin_navbar')

@section('links')
    <link rel="stylesheet" href="{{ URL::to('style/landing.css') }}"> 
    <style>
        h1 {
            text-align: center
        }
    </style>
@endsection

@section('content')
    <div class="center-container">
    <h1>Edit Game </h1>
    <form action="{{ route('editGame', ['game_id' => $game->game_id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="input-container">
            <label for="game_name">Name</label>
            <input type="text" name="game_name" id="game_name" class="input-box" value="{{ $game->game_name }}">
        </div>
        <div class="input-container">
            <label for="price">Price</label>
            <input type="text" name="price" id="price" class="input-box" value="{{ $game->price }}">
        </div>
        <div class="input-container">
            <label for="description">Description</label>
            <input type="text" name="description" id="description" class="input-box" value="{{ $game->description }}">
        </div>
        <div class="input-container">
            <label for="image">Image</label>
            <input type="file" name="image" id="image" class="input-box">
        </div>
        <div class="input-container">
            <button type="submit">Edit Game</button>
        </div>
    @if ($errors->any())
        <div class="error">
            {{ $errors->first() }}
        </div>
    @endif
    </form>
    </div>
@endsection

