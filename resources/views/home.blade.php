@extends('layouts.main')

@section('content')
    @if(session()->has('denied'))
    <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
        <strong>{{ session('denied') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if(session()->has('create'))
    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
        <strong>{{ session('create') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <h1 class="title-home text-center">Welcome, {{ Auth::user()->name }}</h1>

    <div>
        <form action="" class="d-flex justify-content-between">
            <input type="text" id="cari" class="form-control cari" aria-describedby="passwordHelpBlock" placeholder="Search here">
            {{-- <div id="dataTable_filter" class="dataTables_filter"><input type="search" class="form-control form-control-sm cari" placeholder="Search here" aria-controls="dataTable"></div> --}}
            <button type="submit" class="btn btn-success cari">Search</button>
        </form>
    </div>
    <div class="container black bg-light box">
        <h1 class="text-center">Popular Destination</h1>
        <hr>
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <?php $i = 1 ?>
                @foreach ($allDestination as $destination)
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $i-1 }}" {{ ($i == 1) ? "class=active" : ' ' }} {{ ($i == 1) ? "aria-current=true" : '' }} aria-label="Slide {{ $i }}"></button>
                <?php $i++ ?>
                @endforeach
            </div>
            <div class="carousel-inner">
                <?php $i = 1 ?>
                @foreach ($allDestination as $destination)
                    <div class="carousel-item {{ ($i == 1) ? 'active' : ' ' }}">
                        <div class="card bg-dark text-white d-block img-thumbnail">
                            <img src="img/bali.png" class="img w-100" alt="...">
                            <div class="card-img-overlay color">
                                <h1 class="card-title">{{ $destination->namaObjek }}</h1>
                                <p class="card-text">{{ $destination->deskripsi }}</p>
                            </div>
                        </div>
                    </div> 
                <?php $i++ ?>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <div class="row row-cols-1 row-cols-md-2 g-4 black">
        
        <div class="col">
            <a href="/nature" class="no-link">
            <div class="card h-100 link">
            <img src="img/alam.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h1 class="card-title">Nature Destination</h1>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            </div>
            </div>
            </a>
        </div>
        
        
        <div class="col">
            <a href="/culture" class="no-link">
            <div class="card h-100 link">
            <img src="img/budaya.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h1 class="card-title">Culture Destination</h1>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            </div>
            </div>
            </a>
        </div>
        
    </div>

    <h1 class="text-center mt-3">All Destination</h1>

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