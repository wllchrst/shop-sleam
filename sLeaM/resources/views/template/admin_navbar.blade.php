@extends('template.navbar')

@section('anchors')
    <a href="{{ route('gamePage') }}">Game</a>
    <a href="{{ route('addGamePage') }}">Add Game</a> 
    <a href="{{ route('logout') }}">Logout</a> 
@endsection
