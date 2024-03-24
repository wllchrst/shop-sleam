@extends('template.member_navbar')

@section('links')
        <link rel="stylesheet" href="{{ URL::asset('style/landing.css') }}"> 
@endsection

@section('content')
<form action="{{ route('editProfile') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="input-container">
                <label for="image">Profile Picture</label>
                <input type="file" name="image" id="image" class="input-box">
        </div>
        <div class="input-container">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" class="input-box" >
        </div>
        <div class="input-container">
                <button type="submit">Edit</button>
        </div>
        @if ($errors->any())
                <div class="error">
                        {{ $errors->first() }}
                </div>
        @endif
        </form>
@endsection
