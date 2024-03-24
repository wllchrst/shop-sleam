@extends('template.landing')

@section('content')
    {{-- ! username, password --}}
    <form action="{{ route('login') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="input-container">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" class="input-box" autofocus>
        </div>
        <div class="input-container">
            <label for="password">Password</label> 
            <input type="password" name="password" id="password" class="input-box">
        </div>
        <div class="input-container">
            <button type="submit">Sign Up</button>
        </div>

        <div class="input-container">
            <a href="{{ route('registerPage') }}" style="font-size: 25px">Register</a>
        </div>
        

        @if ($errors->any())
            <div class="error">
                {{ $errors->first() }}
            </div>
        @endif
    </form> 
@endsection
