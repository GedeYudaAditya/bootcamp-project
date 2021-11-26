<?php


namespace App\Http\Controllers;

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
        $request->session('log');
        $request->session('user');
        $validatedData = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required|min:8'
        ]);

        $user = akun::where('email', $validatedData['email'])->first();
        if ($user) {
            if (Hash::check($validatedData['password'], $user->Password)) {
                $request->session()->put('log', true);
                $request->session()->put('user', $user->Nama_Akun);
                return redirect()->intended('/');
            }
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
            'email' => 'required|email:dns|unique:akuns',
            'telp' => 'required',
            'password' => 'required|min:8',
            'password2' => 'required|min:8',
            'role' => 'required'
        ]);

        if ($validatedData['password'] == $validatedData['password2']) {
            $validatedData['password'] = Hash::make($validatedData['password']);

            akun::create([
                'Nama_Akun' => $validatedData['nama'],
                'email' => $validatedData['email'],
                'Kategori_Akun' => $validatedData['role'],
                'Password' => $validatedData['password']
            ]);

            $user = akun::where('email', $validatedData['email'])->first();

            if ($validatedData['role'] == 1) {
                guide::create([
                    'NamaGuide' => $validatedData['nama'],
                    'noTlp' => $validatedData['telp'],
                    'fk_Id_Akun' => $user->Id_akun,
                    'alamat' => 'Belum di tentukan'
                ]);
            }

            touris::create([
                'namaTouris' => $validatedData['nama'],
                'noTlpn' => $validatedData['telp'],
                'fk_id_akun' => $user->Id_akun
            ]);
            $request->session()->flash('success', "Creating Account Successfully!!");
            return redirect('/login');
        } else {
            return back()->with('failed', "Creating Account Failed!, The Password doesn't Match!!");
        }
    }

    public function logout(Request $request)
    {
        $request->session()->forget(['log', 'user']);
        return back();
    }
}
