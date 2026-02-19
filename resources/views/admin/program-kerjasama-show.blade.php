@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Detail Program Kerjasama</h3>
        
        <!-- Detail Program Kerjasama -->
<div>
    <h3>Detail Program Kerjasama</h3>
    <p><strong>Mitra Kerjasama:</strong> {{ $programKerjasama->mitra_kerjasama }}</p>
    <p><strong>Tahun:</strong> {{ $programKerjasama->tahun }}</p>
    <p><strong>Jangka Waktu:</strong> {{ $programKerjasama->jangka_waktu }}</p>
    <p><strong>Tanggal Mulai:</strong> {{ $programKerjasama->tanggal_mulai }}</p>
    <p><strong>Tanggal Selesai:</strong> {{ $programKerjasama->tanggal_selesai }}</p>
    <p><strong>Tingkat:</strong> {{ $programKerjasama->tingkat }}</p>
    <a href="{{ route('daftar.kerjasama.nasional') }}">Kembali</a>
</div>


        <!-- Tombol untuk kembali ke halaman sebelumnya -->
        <a href="{{ route('daftar.kerjasama.nasional') }}" class="btn btn-secondary">Kembali ke Daftar Kerjasama</a>
    </div>
@endsection
