@extends('layouts.app')

@section('content')
<div class="card">
  <div class="card-header">
    {{ $kategori->exists ? 'Edit Kategori' : 'Tambah Kategori' }}
  </div>
  <div class="card-body">
    <form action="{{ $kategori->exists ? route('kategori.update', $kategori->id) : route('kategori.store') }}" method="POST">
      @csrf
      @if($kategori->exists) @method('PUT') @endif

      <div class="mb-3">
        <label>Nama Kategori</label>
        <input type="text" name="nama" class="form-control" value="{{ old('nama', $kategori->nama) }}" required>
        @error('nama') <div class="text-danger">{{ $message }}</div>@enderror
      </div>

      <a href="{{ route('kategori.index') }}" class="btn btn-secondary">Kembali</a>
      <button class="btn btn-primary" type="submit">Simpan</button>
    </form>
  </div>
</div>
@endsection
