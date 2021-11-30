@extends('layouts.main')

@section('content')
    <h1 class="text-center">Welcome {{ Auth::user()->name }}. You can create or edit your own destination</h1>

    <div class="row row-cols-1 row-cols-md-2 g-4 black">
        
        <div class="col">
            <a href="create/nature" class="no-link">
            <div class="card h-100 link">
            <img src="img/alam.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h1 class="card-title">Create Nature Destination</h1>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            </div>
            </div>
            </a>
        </div>
        
        
        <div class="col">
            <a href="create/culture" class="no-link">
            <div class="card h-100 link">
            <img src="img/budaya.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h1 class="card-title">Create Culture Destination</h1>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            </div>
            </div>
            </a>
        </div>
    </div>

    <h1 class="text-center mt-5">List Own destination</h1>
    @if(session()->has('delsuccess'))
        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            <strong>{{ session('delsuccess') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if(session()->has('delfail'))
        <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
            <strong>{{ session('delfail') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if(session()->has('update'))
        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            <strong>{{ session('update') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
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
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($userDestination as $Destination)
                    <tr>
                        <td>{{ $Destination->namaObjek }}</td>
                        <td>{{ $Destination->price }}</td>
                        {{-- <td>{{ $Destination->day }}</td> --}}
                        <td>{{ $Destination->type }}</td>
                        <td>{{ $Destination->category }}</td>
                        <td>{{ $Destination->fasilitas }}</td>
                        {{-- <td>{{ $Destination->deskripsi }}</td> --}}
                        <td class="d-flex justify-content-center">
                            <a href="create/info/{{ $Destination->type }}/{{ $Destination->id_objek_wisata }}" class="btn btn-primary m-1" style="width: 40px"> <i  class="fa fa-info"></i> </a>
                            <a href="create/edit/{{ $Destination->type }}/{{ $Destination->id_objek_wisata }}" class="btn btn-success m-1" style="width: 40px"> <i  class="fa fa-edit"></i> </a>
                            <a onclick="return confirm('Yakin ingin menghapus data destinasi ini?')" href="create/delete/{{ $Destination->id_objek_wisata }}" class="btn btn-danger m-1" style="width: 40px"> <i  class="fa fa-trash"></i> </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
