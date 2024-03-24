@extends('template.member_navbar')

@section('links')
    <style>
        .info-container {
            border: 1px solid white;
            display: flex; 
            padding: 3rem;
            border-radius: 35px;
            gap: 2rem;
        }

        .picture img {
            width: 600px;
            height:600px;
        }

        .profile-info h1 {
            font-size: 50px;
        }

        .profile-info h3 {
            font-size: 25px;
        }

        #edit-button {
            font-size: x-large;
            background-color: transparent;
            color: white;
            padding: 2rem;
            border: 1px solid white;
            border-radius: 20px;
        }
    </style>
@endsection

@section('content')
    <div class="info-container">
        <div class="picture">
            <img src="{{ Storage::url($user->image_url) }}" alt="">
        </div>
        <div class="profile-info">
            <h1>{{ $user->username }}</h1>
            <h3>{{ $user->email }}</h3>
            <form action="{{ route('editProfilePage') }}">
                <button type="submit" id="edit-button">Edit</button>
            </form>
        </div>
    </div>
@endsection
