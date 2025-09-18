@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Arsip Surat >> Unggah</h3>
    <p>Unggah surat yang telah terbit pada form ini untuk diarsipkan.<br>
       <small><i>* Gunakan file berformat PDF</i></small>
    </p>
    <form action="{{ route('surat.store') }}" method="POST" enctype="multipart/form-data">
      @csrf

        <div class="mb-3">
            <label for="nomor_surat">Nomor Surat</label>
            <input type="text" name="nomor_surat" class="form-control" placeholder="Contoh: 2022/PD3/TU/001" required>
        </div>

        <div class="mb-3">
            <label for="kategori_id">Kategori</label>
            <select name="kategori_id" class="form-control" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach($kategoris as $kategori)
                    <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="judul">Judul</label>
            <input type="text" name="judul" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="file">File Surat (PDF)</label>
            <input type="file" name="file" class="form-control" accept="application/pdf" required>
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('surat.index') }}" class="btn btn-secondary"><< Kembali</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>
@endsection
