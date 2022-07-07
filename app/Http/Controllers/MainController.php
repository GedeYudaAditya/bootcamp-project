<?php

namespace App\Http\Controllers;

use App\Models\objekwisata;
use Illuminate\Http\Request;
use App\Models\detail_pemilihan;
use PhpParser\Node\Expr\FuncCall;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MainController extends Controller
{
    public function index()
    {
        Request()->session()->flash('index', "menu");
        $data = [
            'title' => 'Home',
            'allDestination' => DB::select('select * from objekwisatas')
        ];
        return view('menu/home', $data);
    }

    public function dashboard()
    {
        $data = [
            'title' => 'Create Destination',
            'userDestination' => DB::select("select * from objekwisatas where fk_id_user=" . Auth::user()->id)
        ];
        return view('guide/dashboard', $data);
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
            'peta' => 'required',
            'kab' => 'required',
            'alamat' => 'required',
            'desc' => 'required',
            'image' => 'image|file|max:1024'
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('wisata-image');
        }
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
            'peta' => $validatedData['peta'],
            'kabupaten' => $validatedData['kab'],
            'alamat' => $validatedData['alamat'],
            'deskripsi' => $validatedData['desc'],
            'like' => 0,
            'dislike' => 0,
            'image' => $validatedData['image']
        ]);

        $request->session()->flash('create', "Creating Destination Successfully!!");
        return redirect('/dashboard');
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
            'peta' => 'required',
            'kab' => 'required',
            'alamat' => 'required',
            'desc' => 'required',
            'image' => 'image|file|max:1024'
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('wisata-image');
        }
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
            'peta' => $validatedData['peta'],
            'kabupaten' => $validatedData['kab'],
            'alamat' => $validatedData['alamat'],
            'deskripsi' => $validatedData['desc'],
            'like' => 0,
            'dislike' => 0,
            'image' => $validatedData['image']
        ]);

        $request->session()->flash('create', "Creating Destination Successfully!!");
        return redirect('/dashboard');
    }

    public function deleteDestination($type, $id)
    {
        $data = DB::table('objekwisatas')->where('id_objek_wisata', $id)->where('type', $type)->get();
        if ($data[0]->image) {
            Storage::delete($data[0]->image);
        }
        if (DB::table('objekwisatas')->where('id_objek_wisata', $id)->where('type', $type)->delete() > 0) {
            Request()->session()->flash('delsuccess', "Delete Destination Successfully!!");
            return redirect('/dashboard');
        } else {
            Request()->session()->flash('delfail', "Delete Destination Failed!!");
            return redirect('/dashboard');
        }
    }
    public function infoDestination($type, $id)
    {
        $join = DB::table('objekwisatas')
            ->select()->where('objekwisatas.fk_id_user', '=', Auth::user()->id)->where('users.id', '=', Auth::user()->id)->where('objekwisatas.id_objek_wisata', '=', $id)->where('objekwisatas.type', $type)
            ->join('users', 'objekwisatas.fk_id_user', '=', 'users.id')
            ->get();

        if ($join == '[]') {
            $join = DB::table('objekwisatas')
                ->select()->where('objekwisatas.id_objek_wisata', '=', $id)->where('objekwisatas.type', $type)
                ->join('users', 'objekwisatas.fk_id_user', '=', 'users.id')
                ->get();
        }

        $data = [
            'title' => 'Info',
            'detailData' => $join
        ];
        return view('info', $data);
    }
    public function editDestination($type, $id)
    {
        $idUserData = DB::select('select * from objekwisatas where id_objek_wisata=' . $id);

        if (Auth::user()->id != $idUserData[0]->fk_id_user) {
            Request()->session()->flash('denied', "Access Denied!!");
            return redirect('/');
        }
        $data = [
            'title' => 'Create Destination',
            'detailData' => DB::select("select * from objekwisatas where fk_id_user=" . Auth::user()->id . " AND id_objek_wisata=" . $id),
            'type' => $type,
            'id' => $id
        ];
        return view('guide/manipulation/edit', $data);
    }

    public function actEditDest(Request $request, $type, $id)
    {
        $validatedData = $request->validate([
            'id_objek_wisata' => 'required',
            'namaObjek' => 'required',
            'price' => 'required',
            'day' => 'required',
            'type' => 'required',
            'category' => 'required',
            'fk_id_user' => 'required',
            'fasilitas' => 'required',
            'peta' => 'required',
            'kabupaten' => 'required',
            'alamat' => 'required',
            'deskripsi' => 'required',
            'like' => 'required',
            'dislike' => 'required',
            'image' => 'image|file|max:1024'
        ]);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('wisata-image');
        }

        $stringsH = '';
        $stringsF = '';
        $i = 0;
        foreach ($validatedData['day'] as $hari) {
            if ($i == count($validatedData['day']) - 1) {
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

        $validatedData['day'] = $stringsH;
        $validatedData['fasilitas'] = $stringsF;

        $condition = objekwisata::where("fk_id_user", Auth::user()->id)->where("id_objek_wisata", $id)->where("type", $type)
            ->update($validatedData);
        if ($condition) {
            $request->session()->flash('update', "Update Destination Successfully!!");
            return redirect('/dashboard');
        }
        $request->session()->flash('errorup', "Update Destination Error!!");
    }

    public function createCulture()
    {
        $data = [
            'title' => 'Create Destination',
        ];
        return view('guide/manipulation/culture', $data);
    }
    public function createNature()
    {
        $data = [
            'title' => 'Create Destination',
        ];
        return view('guide/manipulation/nature', $data);
    }

    public function nature()
    {
        Request()->session()->flash('menu', "menu");
        $data = [
            'title' => 'Nature Tourism',
            'allDestination' => DB::select("select * from objekwisatas where type='nature'")
        ];
        return view('menu/nature', $data);
    }

    public function culture()
    {
        Request()->session()->flash('menu', "menu");
        $data = [
            'title' => 'Culture Tourism',
            'allDestination' => DB::select("select * from objekwisatas where type='culture'")
        ];
        return view('menu/culture', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'Tentang'
        ];
        return view('menu/about', $data);
    }

    public function account()
    {
        $data = [
            'title' => 'Account'
        ];
        return view('account', $data);
    }

    public function addlike(Request $request, $type, $id)
    {
        $object = DB::table('objekwisatas')->where('id_objek_wisata', $id)->where('type', $type)->get();

        // dd($object[0]->like);

        if ($object) {

            $like = $object[0]->like;
            $like += 1;
            objekwisata::where('id_objek_wisata', $id)->where('type', $type)->update(array('like' => $like));

            return back();
        }
    }
    public function adddislike(Request $request, $type, $id)
    {
        $object = DB::table('objekwisatas')->where('id_objek_wisata', $id)->where('type', $type)->get();

        if ($object) {

            $dislike = $object[0]->dislike;
            $dislike += 1;
            objekwisata::where('id_objek_wisata', $id)->where('type', $type)->update(array('dislike' => $dislike));

            return back();
        }
    }

    public function pesan($type, $id)
    {
        $object = DB::table('objekwisatas')
            ->select()->where('objekwisatas.id_objek_wisata', '=', $id)->where('objekwisatas.type', $type)
            ->join('users', 'objekwisatas.fk_id_user', '=', 'users.id')
            ->get();
        $data = [
            'title' => 'Info',
            'destinasi' => $object
        ];
        return view('pesan', $data);
    }

    public function actPesan()
    {
        $validatedData = Request()->validate([
            "jumlahTiket" => "required",
            "totalHarga" => "required",
            "fk_id_objekWisata" => "required",
            "fk_id_member" => "required",
            "waktu" => "required"
        ]);

        detail_pemilihan::insert($validatedData);
        return redirect('/ticket');
    }

    public function ticket()
    {
        $id = Auth::user()->id;
        $destinasi = detail_pemilihan::select()->where('fk_id_member', '=', $id)
            ->join('users', 'detail_pemilihans.fk_id_member', '=', 'users.id')
            ->join('objekwisatas', 'detail_pemilihans.fk_id_objekWisata', '=', 'objekwisatas.id_objek_wisata')
            ->get();
        $data = [
            'title' => 'Account',
            'destinasi' => $destinasi
        ];
        return view('tiketprint', $data);
    }
}
