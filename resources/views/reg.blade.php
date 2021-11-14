@extends('layouts.main')

@section('content')
    <h1 class="text-center">Registration</h1>

        <form action="" method="POST">
            <label class="label" for="first-n">First Name</label>
            <div class="new-chat-window">
                <i class="fa fa-user"></i>
                <input class="new-chat-window-input" type="text" name="first-n" id="first-n" placeholder="Your First Name" required>
            </div>
            <label class="label" for="last-n">Last Name</label>
            <div class="new-chat-window">
                <i class="fa fa-user-o"></i>
                <input class="new-chat-window-input" type="text" name="last-n" id="last-n" placeholder="Your Last Name" required>
            </div>
            <label class="label" for="email">Email</label>
            <div class="new-chat-window">
                <i class="fa fa-envelope"></i>
                <input class="new-chat-window-input" type="email" name="email" id="email" placeholder="example@email.com" required>
            </div>
            <label class="label" for="pass">Password</label>
            <div class="new-chat-window">
                <i class="fa fa-lock"></i>
                <input class="new-chat-window-input" type="password" name="pass" id="pass" placeholder="Make Your Password" required>
            </div>
            <label class="label" for="pass2">Confirm Password</label>
            <div class="new-chat-window">
                <i class="fa fa-unlock-alt"></i>
                <input class="new-chat-window-input" type="password" name="pass2" id="pass2" placeholder="Confirm Your Password" required>
            </div>
            <label class="label" for="role">What do you want to be?</label>
            <div class="new-chat-window">
                <i class="fa fa-id-card"></i>
                <select id="role" class="form-select new-chat-window-input-select" aria-label=".form-select-sm example" name="role" required>
                    <option selected>Select Your Rule</option>
                    <option value="0">Tourist</option>
                    <option value="1">Guides</option>
                </select>
            </div>
            <p>You Alredy Have an account? <a class="forget" href="/login"><b>Please Login..</b></a></p>
            <button type="button" name="submit" class="btn btn-info"><b>Sign-in</b></button>
        </form>

@endsection