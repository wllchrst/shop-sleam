@extends('template.landing')

@section('content')
    {{-- ! username, email, password --}}
    <form action="/register" method="POST" enctype="multipart/form-data">
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
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="input-box">
        </div>
        <div class="input-container">
            <label for="password">Password</label> 
            <input type="password" name="password" id="password" class="input-box">
        </div>
        <div class="input-container">
            <button type="submit">Sign Up</button>
        </div>
        
        <div class="input-container">
            <a href="{{ route('loginPage') }}" style="font-size: 25px">Login</a>
        </div>


        @if ($errors->any())
            <div class="error">
                {{ $errors->first() }}
            </div>
        @endif
    </form>
@endsection
