<?php

namespace App\Http\Controllers;

use App\Models\objekwisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Home',
            'allDestination' => DB::select('select * from objekwisatas')
        ];
        return view('home', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Create Destination',
            'userDestination' => DB::select("select * from objekwisatas where fk_id_user=" . Auth::user()->id)
        ];
        return view('create', $data);
    }

    public function storeCulture(Request $request)
    {
        $validatedData = $request->validate([
            'namaObjek' => 'required|unique:objekwisatas',
            'harga' => 'required',
            'hari' => 'required',
            'type' => 'required',
            'kategori' => 'required',
            'fk_id_user' => 'required',
            'fasilitas' => 'required',
            'kab' => 'required',
            'alamat' => 'required',
            'desc' => 'required',
            'rating' => 'required'
        ]);

        $stringsH = '';
        $stringsF = '';
        $i = 0;
        foreach ($validatedData['hari'] as $hari) {
            if ($i == count($validatedData['hari']) - 1) {
                $stringsH .= $hari;
            } else {
                $stringsH .= $hari . ',';
            }
            $i++;
        }
        $i = 0;
        foreach ($validatedData['fasilitas'] as $fasilitas) {
            if ($i == count($validatedData['fasilitas']) - 1) {
                $stringsF .= $fasilitas;
            } else {
                $stringsF .= $fasilitas . ',';
            }
            $i++;
        }
        objekwisata::create([
            'namaObjek' => $validatedData['namaObjek'],
            'price' => $validatedData['harga'],
            'day' => $stringsH,
            'type' => $validatedData['type'],
            'category' => $validatedData['kategori'],
            'fk_id_user' => $validatedData['fk_id_user'],
            'fasilitas' => $stringsF,
            'kabupaten' => $validatedData['kab'],
            'alamat' => $validatedData['alamat'],
            'deskripsi' => $validatedData['desc'],
            'rating' => $validatedData['rating']
        ]);

        $request->session()->flash('create', "Creating Destination Successfully!!");
        return redirect('/');
    }

    public function storeNature(Request $request)
    {
        $validatedData = $request->validate([
            'namaObjek' => 'required|unique:objekwisatas',
            'harga' => 'required',
            'hari' => 'required',
            'type' => 'required',
            'kategori' => 'required',
            'fk_id_user' => 'required',
            'fasilitas' => 'required',
            'kab' => 'required',
            'alamat' => 'required',
            'desc' => 'required',
            'rating' => 'required'
        ]);

        $stringsH = '';
        $stringsF = '';
        $i = 0;
        foreach ($validatedData['hari'] as $hari) {
            if ($i == count($validatedData['hari']) - 1) {
                $stringsH .= $hari;
            } else {
                $stringsH .= $hari . ',';
            }
            $i++;
        }
        $i = 0;
        foreach ($validatedData['fasilitas'] as $fasilitas) {
            if ($i == count($validatedData['fasilitas']) - 1) {
                $stringsF .= $fasilitas;
            } else {
                $stringsF .= $fasilitas . ',';
            }
            $i++;
        }
        objekwisata::create([
            'namaObjek' => $validatedData['namaObjek'],
            'price' => $validatedData['harga'],
            'day' => $stringsH,
            'type' => $validatedData['type'],
            'category' => $validatedData['kategori'],
            'fk_id_user' => $validatedData['fk_id_user'],
            'fasilitas' => $stringsF,
            'kabupaten' => $validatedData['kab'],
            'alamat' => $validatedData['alamat'],
            'deskripsi' => $validatedData['desc'],
            'rating' => $validatedData['rating']
        ]);

        $request->session()->flash('create', "Creating Destination Successfully!!");
        return redirect('/');
    }

    public function deleteDestination($type, $id)
    {
        if (DB::table('objekwisatas')->where('id_objek_wisata', $id)->where('type', $type)->delete() > 0) {
            Request()->session()->flash('delsuccess', "Delete Destination Successfully!!");
            return redirect('/create');
        } else {
            Request()->session()->flash('delfail', "Delete Destination Failed!!");
            return redirect('/create');
        }
    }
    public function infoDestination($type, $id)
    {
        $join = DB::table('objekwisatas')
            ->select()->where('objekwisatas.fk_id_user', '=', Auth::user()->id)->where('users.id', '=', Auth::user()->id)->where('objekwisatas.id_objek_wisata', '=', $id)->where('objekwisatas.type', $type)
            ->join('users', 'objekwisatas.fk_id_user', '=', 'users.id')
            ->get();

        $data = [
            'title' => 'Create Destination',
            'detailData' => $join
        ];
        return view('info', $data);
    }
    public function editDestination($type, $id)
    {
        $data = [
            'title' => 'Create Destination',
            'detailData' => DB::select("select * from objekwisatas where fk_id_user=" . Auth::user()->id . " AND id_objek_wisata=" . $id),
            'type' => $type
        ];
        return view('edit', $data);
    }

    public function actEditDest(Request $request)
    {
        $validatedData = $request->validate([
            'namaObjek' => 'required|unique:objekwisatas',
            'price' => 'required',
            'day' => 'required',
            'type' => 'required',
            'category' => 'required',
            'fk_id_user' => 'required',
            'fasilitas' => 'required',
            'kabupaten' => 'required',
            'alamat' => 'required',
            'deskripsi' => 'required',
            'rating' => 'required'
        ]);

        $stringsH = '';
        $stringsF = '';
        $i = 0;
        foreach ($validatedData['hari'] as $hari) {
            if ($i == count($validatedData['hari']) - 1) {
                $stringsH .= $hari;
            } else {
                $stringsH .= $hari . ',';
            }
            $i++;
        }
        $i = 0;
        foreach ($validatedData['fasilitas'] as $fasilitas) {
            if ($i == count($validatedData['fasilitas']) - 1) {
                $stringsF .= $fasilitas;
            } else {
                $stringsF .= $fasilitas . ',';
            }
            $i++;
        }

        $validatedData['hari'] = $stringsH;
        $validatedData['fasilitas'] = $stringsF;

        objekwisata::where()
            ->update($validatedData);

        $request->session()->flash('update', "Update Destination Successfully!!");
        return redirect('/create');
    }

    public function createCulture()
    {
        $data = [
            'title' => 'Create Destination',
            'user' => session('user'),
            'role' => session('role')
        ];
        return view('cultureC', $data);
    }
    public function createNature()
    {
        $data = [
            'title' => 'Create Destination',
            'user' => session('user'),
            'role' => session('role')
        ];
        return view('natureC', $data);
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
