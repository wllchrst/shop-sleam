
@extends('template.navbar')

@section('links')

@endsection

@section('anchors')
    <a href="{{ route('dashboard') }}">Dashboard</a>
    <a href="{{ route('memberGamePage') }}">Buy Game</a>
    <a href="{{ route('libraryPage') }}">Library</a>
    <div class="profile-container">
        <a href="{{ route("profilePage") }}">
            <img src="{{ Storage::url($user->image_url) }}" alt="">
            {{ $user->username }}
        </a>
    </div>
    <a href="{{ route('logout') }}">Logout</a> 
@endsection
