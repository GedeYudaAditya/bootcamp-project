@extends('layouts.main')

@section('content')
    <h1 class="text-center">WELCOME !!!</h1>
    <P class="text-center">Login Now To Continue</P>
    <div class="space"></div>

    <div class="banner">
        
    </div>

    <div class="login">
        <form action="" method="POST">
            <label class="label" for="email">Email Address</label>
            <div class="new-chat-window">
                <i class="fa fa-user"></i>
                <input class="new-chat-window-input" type="email" name="email" id="email" placeholder="example@email.com" required>
            </div>
            <label class="label" for="pass">Password</label>
            <div class="new-chat-window">
                <i class="fa fa-lock"></i>
                <input class="new-chat-window-input" type="password" name="pass" id="pass" placeholder="Your Password" required>
            </div>
            <p>Forget your password? <a class="forget" href="#"><b>click here!</b></a></p>
            <p>Not have an account? <a class="forget" href="/registration"><b>create account!</b></a></p>
            <button type="button" name="submit" class="btn btn-info"><b>Login</b></button>
        </form>
    </div>
@endsection