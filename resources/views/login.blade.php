@extends('layouts.main')
@section('content')
    <h1 class="text-center">WELCOME !!!</h1>
    <P class="text-center">Login Now To Continue</P>
    <div class="space"></div>

    <div class="banner">
        
    </div>

    <div class="login">
        @if(session()->has('success'))
        <div class="col row justify-content-md-center text-center">
            <div class="col-md-5 alert alert-success alert-dismissible fade show text center" role="alert">
                <strong>{{ session('success') }}, Login Now!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
        @endif
        @if(session()->has('logerr'))
        <div class="col row justify-content-md-center text-center">
            <div class="col-md-5 alert alert-danger alert-dismissible fade show text center" role="alert">
                <strong>{{ session('logerr') }}, Worng Password or Account! </strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
        @endif
        <form action="/login" method="POST">
            @csrf
            <label class="label" for="email">Email Address</label>
            <div class="new-chat-window">
                <i class="fa fa-user"></i>
                <input class="new-chat-window-input form-control @error('email') is-invalid @enderror" type="email" name="email" id="email" placeholder="example@email.com" required value="{{ old('email') }}" autofocus>
            </div>
            @error('email')
                <div class="invalid-feedback massage">
                    {{ $message }}
                </div>
            @enderror
            <label class="label" for="password">Password</label>
            <div class="new-chat-window">
                <i class="fa fa-lock"></i>
                <input class="new-chat-window-input form-control @error('password') is-invalid @enderror" type="password" name="password" id="password" placeholder="Your Password" required>
            </div>
            @error('password')
                <div class="invalid-feedback massage">
                    {{ $message }}
                </div>
            @enderror
            <p>Forget your password? <a class="forget" href="#"><b>click here!</b></a></p>
            <p>Not have an account? <a class="forget" href="/registration"><b>create account!</b></a></p>
            <button type="submit" name="submit" class="btn btn-info"><b>Login</b></button>
        </form>
    </div>
@endsection