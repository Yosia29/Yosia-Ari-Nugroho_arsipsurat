@extends('layouts.app')

@section('content')
<h3>Arsip Surat</h3>
<p>Berikut ini adalah surat-surat yang telah terbit dan diarsipkan.<br>
Klik "Lihat" pada kolom aksi untuk menampilkan surat.</p>

<form method="GET" action="/" class="d-flex mb-3" role="search">
    <input class="form-control me-2" type="search" placeholder="Cari surat..." name="search" value="{{ request('search') }}">
    <button class="btn btn-dark" type="submit">Cari!</button>
</form>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nomor Surat</th>
            <th>Kategori</th>
            <th>Judul</th>
            <th>Waktu Pengarsipan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($surats as $surat)
        <tr>
            <td>{{ $surat->nomor_surat }}</td>
            <td>{{ $surat->kategori->nama }}</td>
            <td>{{ $surat->judul }}</td>
            <td>{{ $surat->created_at }}</td>
            <td>
                <form id="form-hapus-{{ $surat->id }}" 
                    action="{{ route('surat.destroy', $surat->id) }}" 
                    method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-danger btn-sm" onclick="hapusSurat({{ $surat->id }})">
                        Hapus
                    </button>
                </form>

                <a href="{{ route('surat.download', $surat->id) }}" class="btn btn-warning btn-sm">Unduh</a>
                <a href="{{ route('surat.lihat', $surat->id) }}" class="btn btn-info btn-sm">Lihat >></a>
            </td>

        </tr>
        @endforeach
    </tbody>
</table>

<a href="{{ route('surat.create') }}" class="btn btn-primary mb-3">Arsipkan Surat..</a>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function hapusSurat(id) {
    Swal.fire({
        title: 'Apakah Anda yakin?',
        text: "Arsip surat ini akan dihapus permanen!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('form-hapus-' + id).submit();
        }
    });
}
</script>
@endsection

