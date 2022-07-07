@extends('layouts.main')

@section('content')
<h1 class="title text-center">Tentukan Pesanan</h1>
<div class="container">
<div class="row">
    <div class="container bg-white col-sm-8 tiket">
        <div class="d-flex justify-content-between">
            <h1>Tiket Wisata</h1>
            <img src="/img/logo.png" alt="logo" width="24" height="24" class="d-inline-block align-text-top">
        </div>
        <hr>
        <table>
            <tr>
                <td class="fw-bold tables">Nama</td>
                <td class="tables"> : {{ Auth::user()->name }}</td>
            </tr>
            <tr>
                <td class="fw-bold tables">Tempat Wisata</td>
                <td class="tables"> : {{ $destinasi[0]->namaObjek }}</td>
            </tr>
            <tr>
                <td class="fw-bold tables">Waktu Pemesanan</td>
                <td class="tables"> : {{ date('d F Y, h:i:s A') }}</td>
            </tr>
            <tr>
                <td class="fw-bold tables">Jumlah tiket</td>
                <td class="tables"> : <span class="jum">1</span> </td>
            </tr>
            <tr>
                <td class="fw-bold tables">Harga Satuan</td>
                <td class="tables"> : Rp. {{ $destinasi[0]->price }},-</td>
            </tr>
            <tr>
                <td class="fw-bold tables">Total</td>
                <td class="tables"> : Rp. <span class="total">{{ $destinasi[0]->price }}</span>,- </td>
            </tr>
        </table>
        <div class="d-flex flex-row-reverse">
            <p class="text-left">Pemilik Wisata</p>
        </div>
        <div class="d-flex flex-row-reverse">
            <span class="fw-bold fst-italic text-left">{{ $destinasi[0]->name }}</span>
        </div>
    </div>
    <div class="container bg-white col-sm-4 tiket">
        <div class="d-flex justify-content-between">
            <h1>Tiket</h1>
            <img src="/img/logo.png" alt="logo" width="24" height="24" class="d-inline-block align-text-top">
        </div>
        <hr>
        <table>
            <tr>
                <td class="fw-bold tables">Code Unique </td>
                <td class="tables"> : RTB_XXX-XXX-XXXX </td>
            </tr>
            <tr>
                <td class="fw-bold tables">Nama</td>
                <td class="tables"> : {{ Auth::user()->name }}</td>
            </tr>
            <tr>
                <td class="fw-bold tables">Tempat Wisata</td>
                <td class="tables"> : {{ $destinasi[0]->namaObjek }}</td>
            </tr>
            <tr>
                <td class="fw-bold tables">Jumlah tiket</td>
                <td class="tables"> : <span class="jum">1</span> </td>
            </tr>
            <tr>
                <td class="fw-bold tables">Total</td>
                <td class="tables"> : Rp. <span class="total">{{ $destinasi[0]->price }}</span>,- </td>
            </tr>
        </table>
    </div>
</div>
<div class="d-flex justify-content-between">
    <div class="container mt-3">
        <b>Pesan :</b>
        <button class="btn btn-success" onclick="plusmyFunction()"> + </button>
        <button class="btn btn-danger" onclick="minusmyFunction()"> - </button>
    </div>
    <div class="container mt-3" style="text-align: end;">
        <form action="/pesan" method="POST">
            @csrf
            <input id="jums" type="hidden" name="jumlahTiket" value="1">
            <input id="totals" type="hidden" name="totalHarga" value="{{ $destinasi[0]->price }}">
            <input type="hidden" name="fk_id_objekWisata" value="{{ $destinasi[0]->id_objek_wisata }}">
            <input type="hidden" name="fk_id_member" value="{{ Auth::user()->id }}">
            <input type="hidden" name="waktu" value="{{ date('d F Y, h:i:s A') }}">
            <button type="submit" class="btn btn-primary">Pesan Sekarang</button>
        </form>
    </div>
</div>
</div>
<script src="/js/scriptTiket.js"></script>
@endsection