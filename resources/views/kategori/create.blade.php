@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Kategori Surat >> Tambah</h2>
    <p>Tambahkan atau edit data kategori. Jika sudah selesai, jangan lupa untuk mengklik tombol "Simpan".</p>

    <form action="{{ route('kategori.store') }}" method="POST">
        @csrf

        {{-- ID kategori otomatis, hanya ditampilkan --}}
        <div class="mb-3">
            <label for="id" class="form-label">ID (Auto Increment)</label>
            <input type="text" class="form-control" id="id" value="{{ $nextId }}" readonly>
        </div>

        {{-- Nama Kategori --}}
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Kategori</label>
            <input type="text" name="nama" id="nama" class="form-control" required>
        </div>

        {{-- Judul/Keterangan --}}
        <div class="mb-3">
            <label for="keterangan" class="form-label">Judul / Keterangan</label>
            <textarea name="keterangan" id="keterangan" class="form-control" rows="3"></textarea>
        </div>

        {{-- Tombol --}}
        <a href="{{ route('kategori.index') }}" class="btn btn-secondary">&laquo; Kembali</a>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
