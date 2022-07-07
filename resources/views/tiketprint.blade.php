@extends('layouts.main')

@section('content')

<div class="container">
    <h1 class="text-center">Tiket Terpesan</h1>
@foreach ($destinasi as $item)
@php
    $pemilik = DB::select('select * from users where id='.$item->fk_id_user);
@endphp
<div class="container bg-white col-sm-8 tiket m-3">
    <div class="d-flex justify-content-between">
        <h1>Tiket Wisata</h1>
        <img src="/img/logo.png" alt="logo" width="24" height="24" class="d-inline-block align-text-top">
    </div>
    <hr>
    <table>
        <tr>
            <td class="fw-bold tables">Nama</td>
            <td class="tables"> : {{ $item->name }}</td>
        </tr>
        <tr>
            <td class="fw-bold tables">Tempat Wisata</td>
            <td class="tables"> : {{ $item->namaObjek }}</td>
        </tr>
        <tr>
            <td class="fw-bold tables">Waktu Pemesanan</td>
            <td class="tables"> : {{ $item->waktu }}</td>
        </tr>
        <tr>
            <td class="fw-bold tables">Jumlah tiket</td>
            <td class="tables"> : {{ $item->jumlahTiket }} </td>
        </tr>
        <tr>
            <td class="fw-bold tables">Harga Satuan</td>
            <td class="tables"> : Rp. {{ $item->price }},-</td>
        </tr>
        <tr>
            <td class="fw-bold tables">Total</td>
            <td class="tables"> : Rp. {{ $item->totalHarga }},- </td>
        </tr>
    </table>
    <div class="d-flex flex-row-reverse">
        <p class="text-left">Pemilik Wisata</p>
    </div>
    <div class="d-flex flex-row-reverse">
        <span class="fw-bold fst-italic text-left">{{ $pemilik[0]->name }}</span>
    </div>
</div>
@endforeach
</div>

@endsection