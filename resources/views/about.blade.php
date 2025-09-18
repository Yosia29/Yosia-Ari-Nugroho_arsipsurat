@extends('layouts.app')

@section('content')
<div class="container">
    <h3>About</h3>
    <div class="row mt-4 align-items-center">
        {{-- Kolom Foto --}}
        <div class="col-md-3 text-center">
            <img src="{{ asset('img/oke (2).jpg') }}" 
                 alt="Foto Profil" 
                 class="img-fluid rounded shadow" 
                 style="max-width:220px; height:auto; object-fit:cover;">
        </div>

        {{-- Kolom Teks --}}
        <div class="col-md-9">
            <p><strong>Aplikasi ini dibuat oleh:</strong></p>
            <p>Nama : YOSIA ARI NUGROHO</p>
            <p>Prodi : D3 Manajemen Informatika</p>
            <p>NIM : 2331730055</p>
            <p>Tanggal : 17 September 2025</p>
        </div>
    </div>
</div>
@endsection
