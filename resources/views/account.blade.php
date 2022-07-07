@extends('layouts.main')

@section('content')
    <div class="text-center">
        <img src="img/yawn.jpeg" alt="..." class="img-thumbnail rounded-circle" width="200">
    </div>

    <h2 class="text-center">{{ Auth::user()->name }}</h2>

    <table class="table table-striped bg-white">
    <tr>
        <th>Role</th>
        <td>: {{ Auth::user()->kategoriAkun }}</td>
    </tr>

    <tr>
        <th>Email</th>
        <td>: {{ Auth::user()->email }}</td>
    </tr>

    <tr>
        <th>No.Telp</th>
        <td>: {{ Auth::user()->noTlp }}</td>
    </tr>
    
    <tr>
        <th>Alamat</th>
        <td>: {{ Auth::user()->alamat }}</td>
    </tr>
    </table>
@endsection