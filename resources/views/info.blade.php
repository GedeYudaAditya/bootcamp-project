@extends('layouts.main')

@section('content')
{{-- @dd($detailData) --}}

<h1 class="text-center" style="margin-top: 20px; margin-bottom: 20px; font-size: 64px;">{{ $detailData[0]->namaObjek }}</h1>

    <div class="container p-5 text-center" style="border-radius: 20px">
        @if ($detailData[0]->image)
            <img src="{{ asset('storage/' . $detailData[0]->image) }}" class="img-thumbnail" alt="...">
        @else
            <img src="https://source.unsplash.com/1200x600?{{ $detailData[0]->type }}" class="img-thumbnail" alt="...">
        @endif
        <br>
        <div class="badge bg-primary mt-5" style="font-size: 24px;">Guide : {{  $detailData[0]->name  }}</div>
        <br>
        <h1 class="badge bg-success mt-2">Update At : {{  $detailData[0]->updated_at  }}</h1>
        <br>
        <h1 class="badge bg-secondary mt-5">Tipe : {{  $detailData[0]->type  }}</h1>
        <h1 class="badge bg-success mt-5">Kategori : {{  $detailData[0]->category  }}</h1>
        <h1 class="badge bg-primary mt-5">Fasilitas : {{  $detailData[0]->fasilitas  }}</h1>
        <div class="container text-start">
            <h1>Deskripsi Wisata</h1>
            <p>{!!   $detailData[0]->deskripsi   !!}</p>
            <div class="container mt-3 text-center">
                @if ($detailData[0]->price <= 10000)
                    <div class="badge bg-success" style="font-size: 24px;">Harga : Rp. {{  $detailData[0]->price  }},-</div>   
                @elseif($detailData[0]->price > 10000 && $detailData[0]->price < 20000)
                    <div class="badge bg-warning" style="font-size: 24px;">Harga : Rp. {{  $detailData[0]->price  }},-</div>
                @else
                    <div class="badge bg-danger" style="font-size: 24px;">Harga : Rp. {{  $detailData[0]->price  }},-</div>
                @endif
            </div>
            <h1>Lokasi Tempat Wisata</h1>
            <div class="text-center">
                {!! $detailData[0]->peta !!}
            </div>
        </div>
        <br>
        <div class="badge bg-secondary m-2" style="font-size: 24px;">Hari Operasional : {{  $detailData[0]->day  }}</div>
        <br>
        <div class="badge bg-secondary m-2" style="font-size: 24px;">Terletak di kabupatan : {{  $detailData[0]->kabupaten  }}</div>
        <div class="badge bg-secondary m-2" style="font-size: 24px;">Alamat Lengkap : {{  $detailData[0]->alamat  }}</div>
        <br>
        <br>
        <div class="container d-flex justify-content-between">
            @if (Auth::user()->kategoriAkun == 'guide' && Auth::user()->id == $detailData[0]->id)
                <a href="http://bootcamp-project.test/dashboard/edit/{{ $detailData[0]->type }}/{{ $detailData[0]->id_objek_wisata }}" class="btn btn-success m-1"><i  class="fa fa-edit"></i> Edit </a>  
            @else
                <a href="/pesan/{{ $detailData[0]->type }}/{{ $detailData[0]->id_objek_wisata }}" class="btn btn-success m-1"> Pesan Tiket </a>
            @endif
            @if (Auth::user()->kategoriAkun == 'touris')
                <a href="http://bootcamp-project.test/{{  $detailData[0]->type  }}" class="btn btn-primary m-1"> Back </a>
            @elseif(Auth::user()->kategoriAkun == 'guide' && session()->has('menu'))
                <a href="http://bootcamp-project.test/{{  $detailData[0]->type  }}" class="btn btn-primary m-1"> Back </a>
            @elseif(session()->has('index'))
                <a href="http://bootcamp-project.test" class="btn btn-primary m-1"> Back </a>
            @else
                <a href="http://bootcamp-project.test/dashboard" class="btn btn-primary m-1"> Back </a>
            @endif
        </div>
    </div>
@endsection