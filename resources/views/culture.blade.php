@extends('layouts.main')

@section('content')

    <h1>List Culture Destination!!</h1>   

    <div class="container bg-white p-5" style="color: black !important; border-radius: 20px">
        <table id="dataTable" class="table table-striped">
            <thead>
                <tr>
                    <th>Nama Objek Wisata</th>
                    <th>Harga</th>
                    {{-- <th>Hari Oprasional</th> --}}
                    <th>Type Destinasi</th>
                    <th>Kategori</th>
                    <th>Fasilitas</th>
                    {{-- <th>Deskripsi</th> --}}
                    <th>Picture</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($allDestination as $Destination)
                    <tr>
                        <td>{{ $Destination->namaObjek }}</td>
                        <td>{{ $Destination->price }}</td>
                        {{-- <td>{{ $Destination->day }}</td> --}}
                        <td>{{ $Destination->type }}</td>
                        <td>{{ $Destination->category }}</td>
                        <td>{{ $Destination->fasilitas }}</td>
                        {{-- <td>{{ $Destination->deskripsi }}</td> --}}
                        <td><img src="{{ url('img/bali.png') }}" class="img-thumbnail w-50" alt="..."></td>
                        <td>
                            <a href="create/info/{{ $Destination->type }}/{{ $Destination->id_objek_wisata }}" class="btn btn-primary m-1" style="width: 40px"> <i  class="fa fa-info"></i> </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection