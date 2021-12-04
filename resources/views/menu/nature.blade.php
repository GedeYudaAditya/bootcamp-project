@extends('layouts.main')

@section('content')

    <h1>List Nature Destination!!</h1>   

    <div class="container bg-white p-5" style="color: black !important; border-radius: 20px;">
        <div class="overflow-auto">
        <table id="dataTable" class="table table-striped">
            <thead>
                <tr>
                    <th>Picture</th>
                    <th>Nama Objek Wisata</th>
                    <th>Harga</th>
                    {{-- <th>Hari Oprasional</th> --}}
                    <th>Type Destinasi</th>
                    <th>Kategori</th>
                    <th>Fasilitas</th>
                    {{-- <th>Deskripsi</th> --}}
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($allDestination as $Destination)
                @php
                    $total = $Destination->like + $Destination->dislike;
                    if($total == 0){
                        $rating = 0;
                    }else{
                        $rating = $Destination->like/$total * 100;
                    }
                @endphp
                    <tr>
                        <td><img src="{{ url('img/bali.png') }}" class="img-thumbnail w-50" alt="..."></td>
                        <td>{{ $Destination->namaObjek }}</td>
                        <td>{{ $Destination->price }}</td>
                        {{-- <td>{{ $Destination->day }}</td> --}}
                        <td>{{ $Destination->type }}</td>
                        <td>{{ $Destination->category }}</td>
                        <td>{{ $Destination->fasilitas }}</td>
                        {{-- <td>{{ $Destination->deskripsi }}</td> --}}
                        <td class="text-center">
                            <span class="fa fa-star {{ ( $rating >= 20 ) ? 'checked' : '' }}"></span>
                            <span class="fa fa-star {{ ( $rating >= 40 ) ? 'checked' : '' }}"></span>
                            <span class="fa fa-star {{ ( $rating >= 60 ) ? 'checked' : '' }}"></span>
                            <span class="fa fa-star {{ ( $rating >= 80 ) ? 'checked' : '' }}"></span>
                            <span class="fa fa-star {{ ( $rating == 100) ? 'checked' : '' }}"></span>
                            <div class="d-flex justify-content-center align-items-center">
                                <a href="dashboard/info/{{ $Destination->type }}/{{ $Destination->id_objek_wisata }}" class="btn btn-primary m-1" style="width: 40px"> <i  class="fa fa-info"></i> </a>
                                <a href="#" class="btn btn-success m-1" style="width: 40px"> <i  class="fa fa-thumbs-up"></i> </a>
                                <a href="#" class="btn btn-danger m-1" style="width: 40px"> <i  class="fa fa-thumbs-down"></i> </a>
                            </div>
                            <span class="badge bg-secondary">{{ $Destination->like }} people like this</span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
@endsection