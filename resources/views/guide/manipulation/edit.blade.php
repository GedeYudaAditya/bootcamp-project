@extends('layouts.main')

@section('content')

@php
    $day = explode(',',$detailData[0]->day)
@endphp

@if(session()->has('errorup'))
    <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
        <strong>{{ session('errorup') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
    <h1 class="text-center">Edit {{ $type }} Destination</h1>

    <form action="http://bootcamp-project.test/dashboard/edit/{{ $type }}/{{ $id }}" method="POST">
        @csrf
        <input type="hidden" name="type" value="nature">
        <label class="label" for="nama">Nama Objek</label>
        <div class="new-chat-window text-dark">
            <i class="fa fa-home"></i>
            <input class="new-chat-window-input form-control @error('namaObjek') is-invalid @enderror" type="text" name="namaObjek" id="nama" placeholder="Nama Tempat Wisata" required value="{{ $detailData[0]->namaObjek }}">
        </div>
        @error('namaObjek')
            <div class="invalid-feedback massage">
                {{ $message }}
            </div>
        @enderror

        <label class="label" for="kab">Terletak di kabupaten?</label>
        <div class="new-chat-window text-dark">
        <i class="fa fa-list-alt"></i>
            <select id="kab" class="form-select new-chat-window-input-select form-control @error('kabupaten') is-invalid @enderror" aria-label=".form-select-sm example" name="kabupaten" required>
                {{-- <option selected>Pilih</option> --}}
                <option {{ ( $detailData[0]->kabupaten == 'badung' ) ? 'selected' : '' }} value="badung">Badung</option>
                <option {{ ( $detailData[0]->kabupaten == 'bangli' ) ? 'selected' : '' }} value="bangli">Bangli</option>
                <option {{ ( $detailData[0]->kabupaten == 'buleleng' ) ? 'selected' : '' }} value="buleleng">Buleleng</option>
                <option {{ ( $detailData[0]->kabupaten == 'gianyar' ) ? 'selected' : '' }} value="gianyar">Gianyar</option>
                <option {{ ( $detailData[0]->kabupaten == 'jembrana' ) ? 'selected' : '' }} value="jembrana">Jembrana</option>
                <option {{ ( $detailData[0]->kabupaten == 'karangasem' ) ? 'selected' : '' }} value="karangasem">Karangasem</option>
                <option {{ ( $detailData[0]->kabupaten == 'kelungkung' ) ? 'selected' : '' }} value="kelungkung">Kelungkung</option>
                <option {{ ( $detailData[0]->kabupaten == 'tabanan' ) ? 'selected' : '' }} value="tabanan">Tabanan</option>
                <option {{ ( $detailData[0]->kabupaten == 'denpasar' ) ? 'selected' : '' }} value="denpasar">Denpasar</option>
            </select>
        </div>

        

        <label class="label" for="alamat">Alamat Objek</label>
        <div class="new-chat-window text-dark">
            <i class="fa fa-home"></i>
            <input class="new-chat-window-input form-control @error('alamat') is-invalid @enderror" type="text" name="alamat" id="alamat" placeholder="Alamat Tempat Wisata" required value="{{ $detailData[0]->alamat }}">
        </div>
        @error('alamat')
            <div class="invalid-feedback massage">
                {{ $message }}
            </div>
        @enderror
        
        <label class="label" for="harga">Biaya (Rp)</label>
        <div class="new-chat-window text-dark">
            <i class="fa fa-credit-card"></i>
            <input class="new-chat-window-input form-control @error('price') is-invalid @enderror" type="number" name="price" id="harga" required value="{{ $detailData[0]->price }}" placeholder="Harga Tiket/Biaya yang di perlukan">
        </div>
        @error('price')
            <div class="invalid-feedback massage">
                {{ $message }}
            </div>
        @enderror

        <label class="label" for="hari">Hari Buka</label>
        <div class="p-4">
            <div class="form-check form-check-inline">
                <input class="form-check-input" name="day[]" type="checkbox" id="inlineCheckbox1" value="senin" {{ ( $day[0] == 'senin' ) ? 'checked' : '' }}>
                <label class="form-check-label" for="inlineCheckbox1">Senin</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" name="day[]" type="checkbox" id="inlineCheckbox2" value="selasa" {{ ( $day[1] == 'selasa' ) ? 'checked' : '' }}>
                <label class="form-check-label" for="inlineCheckbox2">Selasa</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" name="day[]" type="checkbox" id="inlineCheckbox3" value="rabu" {{ ( $day[2] == 'rabu' ) ? 'checked' : '' }}>
                <label class="form-check-label" for="inlineCheckbox3">Rabu</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" name="day[]" type="checkbox" id="inlineCheckbox4" value="kamis" {{ ( $day[3] == 'kamis' ) ? 'checked' : '' }}>
                <label class="form-check-label" for="inlineCheckbox4">Kamis</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" name="day[]" type="checkbox" id="inlineCheckbox5" value="jumat" {{ ( $day[4] == 'jumat' ) ? 'checked' : '' }}>
                <label class="form-check-label" for="inlineCheckbox5">Jum'at</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" name="day[]" type="checkbox" id="inlineCheckbox6" value="sabtu" {{ ( $day[5] == 'sabtu' ) ? 'checked' : '' }}>
                <label class="form-check-label" for="inlineCheckbox6">Sabtu</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" name="day[]" type="checkbox" id="inlineCheckbox7" value="minggu" {{ ( $day[6] == 'minggu' ) ? 'checked' : '' }}>
                <label class="form-check-label" for="inlineCheckbox7">Minggu</label>
            </div>
        </div>
        @error('day')
            <div class="invalid-feedback massage">
                {{ $message }}
            </div>
        @enderror

        @if($type == 'nature')
        <label class="label" for="kategori">Kategori Wisata Alam</label>
        <div class="new-chat-window text-dark">
        <i class="fa fa-list-alt"></i>
            <select id="kategori" class="form-select new-chat-window-input-select form-control @error('category') is-invalid @enderror" aria-label=".form-select-sm example" name="category" required value="{{ $detailData[0]->category }}">
                {{-- <option selected>Pilih Kategori Wisata</option> --}}
                <option {{ ( $detailData[0]->category == 'air terjun' ) ? 'selected' : '' }} value="air terjun">Air Terjun</option>
                <option {{ ( $detailData[0]->category == 'danau' ) ? 'selected' : '' }} value="danau">Danau</option>
                <option {{ ( $detailData[0]->category == 'pegunungan' ) ? 'selected' : '' }} value="pegunungan">Pegunungan</option>
                <option {{ ( $detailData[0]->category == 'taman' ) ? 'selected' : '' }} value="taman">Taman</option>
                <option {{ ( $detailData[0]->category == 'pantai' ) ? 'selected' : '' }} value="pantai">Pantai</option>
            </select>
        </div>
        @error('category')
            <div class="invalid-feedback massage">
                {{ $message }}
            </div>
        @enderror

        <label class="label" for="fasilitas">Fasilitas</label>
        <div class="p-4">
            <div class="form-check form-check-inline">
                <input class="form-check-input" name="fasilitas[]" type="checkbox" id="fasilitas1" value="Tempat Makan" {{ ( $detailData[0]->fasilitas == 'Tempat Makan' ) ? 'checked' : '' }}>
                <label class="form-check-label" for="fasilitas1">Tempat Makan</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" name="fasilitas[]" type="checkbox" id="fasilitas2" value="Penginapan" {{ ( $detailData[0]->fasilitas == 'Penginapan' ) ? 'checked' : '' }}>
                <label class="form-check-label" for="fasilitas2">Penginapan</label>
            </div>
        </div>
        @error('fasilitas')
            <div class="invalid-feedback massage">
                {{ $message }}
            </div>
        @enderror
        @endif

        @if($type == 'culture')
        <label class="label" for="kategori">Kategori Wisata budaya</label>
        <div class="new-chat-window text-dark">
        <i class="fa fa-list-alt"></i>
            <select id="kategori" class="form-select new-chat-window-input-select form-control @error('category') is-invalid @enderror" aria-label=".form-select-sm example" name="category" required value="{{ $detailData[0]->category }}">
                {{-- <option selected>Pilih Kategori Wisata</option> --}}
                <option {{ ( $detailData[0]->category == 'tari' ) ? 'selected' : '' }} value="tari">Seni Tari</option>
                <option {{ ( $detailData[0]->category == 'musik' ) ? 'selected' : '' }} value="musik">Seni Musik</option>
                <option {{ ( $detailData[0]->category == 'drama' ) ? 'selected' : '' }} value="drama">Seni Drama</option>
                <option {{ ( $detailData[0]->category == 'tradisi' ) ? 'selected' : '' }} value="tradisi">Tradisi</option>
            </select>
        </div>
        @error('category')
            <div class="invalid-feedback massage">
                {{ $message }}
            </div>
        @enderror

        <label class="label" for="fasilitas">Fasilitas</label>
        <div class="p-4">
            <div class="form-check form-check-inline">
                <input class="form-check-input" name="fasilitas[]" type="checkbox" id="fasilitas1" value="Luar Ruangan" {{ ( $detailData[0]->fasilitas == 'Luar Ruangan' ) ? 'checked' : '' }}>
                <label class="form-check-label" for="fasilitas1">Luar Ruangan</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" name="fasilitas[]" type="checkbox" id="fasilitas2" value="Dalam Ruangan" {{ ( $detailData[0]->fasilitas == 'Dalam Ruangan' ) ? 'checked' : '' }}>
                <label class="form-check-label" for="fasilitas2">Dalam Ruangan</label>
            </div>
        </div>
        @error('hari')
            <div class="invalid-feedback massage">
                {{ $message }}
            </div>
        @enderror
        @endif

        <div class="container mt-4 mb-4">
            <div class="row justify-content-md-center">
                <div class="col-md-12 col-lg-8">
                    <h1 class="h2 mb-4">Deskripsi Wisata</h1>
                    <label>Deskripsikan tempat wisatamu</label>
                    <div class="form-group mb-3">
                        <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" placeholder="Deskripsi" rows="20" required>{{ $detailData[0]->deskripsi }}</textarea>
                    </div>
                </div>
            </div>
        </div>
        @error('deskripsi')
            <div class="invalid-feedback massage">
                {{ $message }}
            </div>
        @enderror

        <input type="hidden" name="fk_id_user" value="{{ Auth::user()->id }}">
        <input type="hidden" name="like" value="{{ $detailData[0]->like }}">
        <input type="hidden" name="dislike" value="{{ $detailData[0]->dislike }}">
        <input type="hidden" name="id_objek_wisata" value="{{ $detailData[0]->id_objek_wisata }}">
        
        <button type="submit" name="submit" class="btn btn-info"><b>Update</b></button>
    </form>
@endsection