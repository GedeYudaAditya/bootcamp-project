<?php


namespace App\Http\Controllers;

use App\Models\User;
use App\Models\akun;
use App\Models\guide;
use App\Models\touris;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Landing Page'
        ];
        return view('landing', $data);
    }

    public function login()
    {
        if (session('log') == true) {
            return redirect()->intended('/');
        }
        $data = [
            'title' => 'Login'
        ];

        return view('login', $data);
    }

    public function authenticate(Request $request)
    {
        // $request->session('log');
        // $request->session('user');
        // $request->session('role');
        $userData = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required|min:8'
        ]);

        // $user = akun::where('email', $validatedData['email'])->first();
        // if ($user) {
        //     if (Hash::check($validatedData['password'], $user->Password)) {
        //         $request->session()->put('log', true);
        //         $request->session()->put('user', $user->Nama_Akun);
        //         $request->session()->put('role', $user->Kategori_Akun);
        //         return redirect()->intended('/');
        //     }
        // }

        if (Auth::attempt($userData)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->with('logerr', "Login Invalid");
    }

    public function regist()
    {
        $data = [
            'title' => 'Registrasi'
        ];
        return view('reg', $data);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|min:2',
            'email' => 'required|email:dns|unique:users',
            'telp' => 'required',
            'alamat' => 'required',
            'password' => 'required|min:8',
            'password2' => 'required|min:8',
            'role' => 'required'
        ]);

        if ($validatedData['password'] == $validatedData['password2']) {
            $validatedData['password'] = Hash::make($validatedData['password']);

            User::create([
                'name' => $validatedData['nama'],
                'email' => $validatedData['email'],
                'kategoriAkun' => $validatedData['role'],
                'noTlp' => $validatedData['telp'],
                'alamat' => $validatedData['alamat'],
                'password' => $validatedData['password']
            ]);

            // $user = User::where('email', $validatedData['email'])->first();

            // if ($validatedData['role'] == 1) {
            //     guide::create([
            //         'NamaGuide' => $validatedData['nama'],
            //         'noTlp' => $validatedData['telp'],
            //         'fk_Id_Akun' => $user->Id_akun,
            //         'alamat' => 'Belum di tentukan'
            //     ]);
            // }

            // touris::create([
            //     'namaTouris' => $validatedData['nama'],
            //     'noTlpn' => $validatedData['telp'],
            //     'fk_id_akun' => $user->Id_akun
            // ]);
            $request->session()->flash('success', "Creating Account Successfully!!");
            return redirect('/login');
        } else {
            return back()->with('failed', "Creating Account Failed!, The Password doesn't Match!!");
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
