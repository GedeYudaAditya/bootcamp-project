<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        if (session('log') == false) {
            return redirect()->intended('/login');
        }
        $data = [
            'title' => 'Home',
            'user' => session('user')
        ];
        return view('home', $data);
    }

    public function nature()
    {
        $data = [
            'title' => 'Nature Tourism'
        ];
        return view('nature', $data);
    }

    public function culture()
    {
        $data = [
            'title' => 'Culture Tourism'
        ];
        return view('culture', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'Tentang'
        ];
        return view('about', $data);
    }
}
