@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h5>Daftar Kategori Surat</h5>
    <a href="{{ route('kategori.create') }}" class="btn btn-primary">Tambah</a>
</div>

<table class="table table-bordered bg-white">
    <thead><tr><th>ID</th><th>Nama</th><th>Aksi</th></tr></thead>
    <tbody>
        @foreach($kategoris as $k)
        <tr>
            <td>{{ $k->id }}</td>
            <td>{{ $k->nama }}</td>
            <td>
                <a href="{{ route('kategori.edit', $k->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('kategori.destroy', $k->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus kategori ini?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $kategoris->links() }}
@endsection
