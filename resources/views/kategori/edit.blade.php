@extends('layouts.app')

@section('content')
<h3>Edit Kategori</h3>
<form method="POST" action="{{ route('kategori.update', $kategori->id) }}">
    @csrf
    @method('PUT')

    {{-- ID Auto Increment (readonly) --}}
    <div class="mb-3">
        <label>ID (Auto Increment)</label>
        <input type="text" class="form-control" value="{{ $kategori->id }}" readonly>
    </div>

    {{-- Nama Kategori --}}
    <div class="mb-3">
        <label>Nama Kategori</label>
        <input type="text" name="nama" class="form-control" value="{{ $kategori->nama }}" required>
    </div>

    {{-- Keterangan --}}
    <div class="mb-3">
        <label>Keterangan</label>
        <textarea name="keterangan" class="form-control" rows="3" required>{{ $kategori->keterangan }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{ route('kategori.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
