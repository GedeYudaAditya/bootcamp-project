@extends('layouts.main')

@section('content')
    <h1 class="text-center">Registration</h1>
        @if(session()->has('failed'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ session('failed') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <form action="/registration" method="POST">
            @csrf
            <label class="label" for="nama">Name</label>
            <div class="new-chat-window">
                <i class="fa fa-user"></i>
                <input class="new-chat-window-input form-control @error('nama') is-invalid @enderror" type="text" name="nama" id="nama" placeholder="Your Name" required value="{{ old('nama') }}">
            </div>
            @error('nama')
                <div class="invalid-feedback massage">
                    {{ $message }}
                </div>
            @enderror
            
            <label class="label" for="email">Email</label>
            <div class="new-chat-window">
                <i class="fa fa-envelope"></i>
                <input class="new-chat-window-input form-control @error('email') is-invalid @enderror" type="email" name="email" id="email" placeholder="example@email.com" required value="{{ old('email') }}">
            </div>
            @error('email')
                <div class="invalid-feedback massage">
                    {{ $message }}
                </div>
            @enderror
            
            <label class="label" for="telp">No Telp.</label>
            <div class="new-chat-window">
                <i class="fa fa-phone"></i>
                <input class="new-chat-window-input form-control @error('telp') is-invalid @enderror" type="tel" name="telp" id="telp" placeholder="Your Number Telphone" required value="{{ old('telp') }}">
            </div>
            @error('telp')
                <div class="invalid-feedback massage">
                    {{ $message }}
                </div>
            @enderror
            
            <label class="label" for="pass">Password</label>
            <div class="new-chat-window">
                <i class="fa fa-lock"></i>
                <input class="new-chat-window-input form-control @error('password') is-invalid @enderror" type="password" name="password" id="pass" placeholder="Make Your Password" required>
            </div>
            @error('password')
                <div class="invalid-feedback massage">
                    {{ $message }}
                </div>
            @enderror

            <label class="label" for="pass2">Confirm Password</label>
            <div class="new-chat-window">
                <i class="fa fa-unlock-alt"></i>
                <input class="new-chat-window-input form-control @error('password') is-invalid @enderror" type="password" name="password2" id="pass2" placeholder="Confirm Your Password" required>
            </div>
            @error('password2')
                <div class="invalid-feedback massage">
                    {{ $message }}
                </div>
            @enderror

            <label class="label" for="role">What do you want to be?</label>
            <div class="new-chat-window">
                <i class="fa fa-id-card"></i>
                <select id="role" class="form-select new-chat-window-input-select form-control @error('role') is-invalid @enderror" aria-label=".form-select-sm example" name="role" required value="{{ old('role') }}">
                    <option selected>Select Your Rule</option>
                    <option value=0>Tourist</option>
                    <option value=1>Guides</option>
                </select>
            </div>
            @error('role')
                <div class="invalid-feedback massage">
                    {{ $message }}
                </div>
            @enderror
            
            <p>You Alredy Have an account? <a class="forget" href="/login"><b>Please Login..</b></a></p>
            <button type="submit" name="submit" class="btn btn-info"><b>Sign-in</b></button>
        </form>

@endsection