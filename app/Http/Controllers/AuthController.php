<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Auth'
        ];
        return view('auth', $data);
    }

    public function login()
    {
        $data = [
            'title' => 'Login'
        ];
        return view('login', $data);
    }

    public function regist()
    {
        $data = [
            'title' => 'Registrasi'
        ];
        return view('reg', $data);
    }
}
