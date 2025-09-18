@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Kategori Surat</h2>
    <p>Berikut ini adalah kategori yang bisa digunakan untuk melabeli surat.<br>
       Klik "Edit" pada kolom aksi untuk mengubah kategori yang sudah ada.</p>

    {{-- Form Cari --}}
    <form action="{{ route('kategori.index') }}" method="GET" class="mb-3 d-flex">
        <input type="text" name="search" class="form-control me-2" placeholder="Cari kategori..." value="{{ request('search') }}">
        <button type="submit" class="btn btn-primary">Cari</button>
    </form>


    {{-- Tabel Kategori --}}
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID Kategori</th>
                <th>Nama Kategori</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($kategoris as $kategori)
            <tr>
                <td>{{ $kategori->id }}</td>
                <td>{{ $kategori->nama }}</td>
                <td>{{ $kategori->keterangan ?? '-' }}</td>
                <td>
                    {{-- Tombol Hapus pakai SweetAlert --}}
                    <button type="button" class="btn btn-danger btn-sm" onclick="hapusKategori({{ $kategori->id }})">Hapus</button>

                    <form id="form-hapus-{{ $kategori->id }}" action="{{ route('kategori.destroy', $kategori->id) }}" method="POST" style="display:none;">
                        @csrf
                        @method('DELETE')
                    </form>

                    {{-- Tombol Edit --}}
                    <a href="{{ route('kategori.edit', $kategori->id) }}" class="btn btn-warning btn-sm">Edit</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center">Belum ada kategori.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    {{-- Tombol Tambah --}}
    <a href="{{ route('kategori.create') }}" class="btn btn-success">[ + ] Tambah Kategori Baru..</a>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function hapusKategori(id) {
    Swal.fire({
        title: 'Apakah Anda yakin?',
        text: "Kategori ini akan dihapus permanen!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya!',
        cancelButtonText: 'Batal',
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('form-hapus-' + id).submit();
        }
    });
}
</script>
@endsection
