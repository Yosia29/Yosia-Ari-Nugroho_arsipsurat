@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Lihat Surat</h3>
    <p><strong>Nomor Surat:</strong> {{ $surat->nomor_surat }}</p>
    <p><strong>Judul:</strong> {{ $surat->judul }}</p>
    <p><strong>Tanggal:</strong> {{ $surat->tanggal }}</p>

    <div class="mt-3">
        <iframe src="{{ asset('storage/' . $surat->file_path) }}" width="100%" height="600px" style="border: none;"></iframe>
    </div>

    <div class="mt-3">
        <a href="{{ asset('storage/' . $surat->file_path) }}" class="btn btn-primary" download>Unduh</a>
        <a href="{{ route('surat.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</div>
@endsection
