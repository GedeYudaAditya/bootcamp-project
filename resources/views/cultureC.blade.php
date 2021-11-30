@extends('layouts.main')

@section('content')
    <h1 class="text-center">Create Culture Destination</h1>

    <form action="{{ route('addCultureAct') }}" method="POST">
        @csrf
        <input type="hidden" name="type" value="culture">
        <label class="label" for="nama">Nama Objek</label>
        <div class="new-chat-window text-dark">
            <i class="fa fa-home"></i>
            <input class="new-chat-window-input form-control @error('namaObjek') is-invalid @enderror" type="text" name="namaObjek" id="nama" placeholder="Nama Tempat Wisata" required value="{{ old('namaObjek') }}">
        </div>
        @error('namaObjek')
            <div class="invalid-feedback massage">
                {{ $message }}
            </div>
        @enderror

        <label class="label" for="kab">Terletak di kabupaten?</label>
        <div class="new-chat-window text-dark">
        <i class="fa fa-list-alt"></i>
            <select id="kab" class="form-select new-chat-window-input-select form-control @error('kab') is-invalid @enderror" aria-label=".form-select-sm example" name="kab" required value="{{ old('kab') }}">
                <option selected>Pilih</option>
                <option value="badung">Badung</option>
                <option value="bangli">Bangli</option>
                <option value="buleleng">Buleleng</option>
                <option value="gianyar">Gianyar</option>
                <option value="jembrana">Jembrana</option>
                <option value="karangasem">Karangasem</option>
                <option value="kelungkung">Kelungkung</option>
                <option value="tabanan">Tabanan</option>
                <option value="denpasar">Denpasar</option>
            </select>
        </div>

        

        <label class="label" for="alamat">Alamat Objek</label>
        <div class="new-chat-window text-dark">
            <i class="fa fa-home"></i>
            <input class="new-chat-window-input form-control @error('alamat') is-invalid @enderror" type="text" name="alamat" id="alamat" placeholder="Alamat Tempat Wisata" required value="{{ old('alamat') }}">
        </div>
        @error('alamat')
            <div class="invalid-feedback massage">
                {{ $message }}
            </div>
        @enderror
        
        <label class="label" for="harga">Biaya (Rp)</label>
        <div class="new-chat-window text-dark">
            <i class="fa fa-credit-card"></i>
            <input class="new-chat-window-input form-control @error('harga') is-invalid @enderror" type="number" name="harga" id="harga" required value="{{ old('harga') }}" placeholder="Harga Tiket/Biaya yang di perlukan">
        </div>
        @error('harga')
            <div class="invalid-feedback massage">
                {{ $message }}
            </div>
        @enderror

        <label class="label" for="hari">Hari Buka</label>
        <div class="p-4">
            <div class="form-check form-check-inline">
                <input class="form-check-input" name="hari[]" type="checkbox" id="inlineCheckbox1" value="senin">
                <label class="form-check-label" for="inlineCheckbox1">Senin</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" name="hari[]" type="checkbox" id="inlineCheckbox2" value="selasa">
                <label class="form-check-label" for="inlineCheckbox2">Selasa</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" name="hari[]" type="checkbox" id="inlineCheckbox1" value="rabu">
                <label class="form-check-label" for="inlineCheckbox1">Rabu</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" name="hari[]" type="checkbox" id="inlineCheckbox2" value="kamis">
                <label class="form-check-label" for="inlineCheckbox2">Kamis</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" name="hari[]" type="checkbox" id="inlineCheckbox1" value="jumat">
                <label class="form-check-label" for="inlineCheckbox1">Jum'at</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" name="hari[]" type="checkbox" id="inlineCheckbox2" value="sabtu">
                <label class="form-check-label" for="inlineCheckbox2">Sabtu</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" name="hari[]" type="checkbox" id="inlineCheckbox2" value="minggu">
                <label class="form-check-label" for="inlineCheckbox2">Minggu</label>
            </div>
        </div>
        @error('hari')
            <div class="invalid-feedback massage">
                {{ $message }}
            </div>
        @enderror

        <label class="label" for="kategori">Kategori Wisata budaya</label>
        <div class="new-chat-window text-dark">
        <i class="fa fa-list-alt"></i>
            <select id="kategori" class="form-select new-chat-window-input-select form-control @error('kategori') is-invalid @enderror" aria-label=".form-select-sm example" name="kategori" required value="{{ old('kategori') }}">
                <option selected>Pilih Kategori Wisata</option>
                <option value="tari">Seni Tari</option>
                <option value="musik">Seni Musik</option>
                <option value="drama">Seni Drama</option>
                <option value="tradisi">Tradisi</option>
            </select>
        </div>
        @error('kategori')
            <div class="invalid-feedback massage">
                {{ $message }}
            </div>
        @enderror

        <label class="label" for="fasilitas">Fasilitas</label>
        <div class="p-4">
            <div class="form-check form-check-inline">
                <input class="form-check-input" name="fasilitas[]" type="checkbox" id="fasilitas1" value="Luar Ruangan">
                <label class="form-check-label" for="fasilitas1">Luar Ruangan</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" name="fasilitas[]" type="checkbox" id="fasilitas2" value="Dalam Ruangan">
                <label class="form-check-label" for="fasilitas2">Dalam Ruangan</label>
            </div>
        </div>
        @error('hari')
            <div class="invalid-feedback massage">
                {{ $message }}
            </div>
        @enderror

        <div class="container mt-4 mb-4">
            <div class="row justify-content-md-center">
                <div class="col-md-12 col-lg-8">
                    <h1 class="h2 mb-4">Deskripsi Wisata</h1>
                    <label>Deskripsikan tempat wisatamu</label>
                    <div class="form-group mb-3">
                        <textarea class="form-control @error('desc') is-invalid @enderror" name="desc" placeholder="Deskripsi" required value="{{ old('desc') }}"></textarea>
                    </div>
                </div>
            </div>
        </div>
        @error('desc')
            <div class="invalid-feedback massage">
                {{ $message }}
            </div>
        @enderror

        <input type="hidden" name="fk_id_user" value="{{ Auth::user()->id }}">
        <input type="hidden" name="rating" value="0">
        
        <button type="submit" name="submit" class="btn btn-info"><b>Create</b></button>
    </form>
@endsection