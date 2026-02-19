@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Edit Program Kerjasama</h3>

        <!-- Form Edit Program Kerjasama -->
        <form action="{{ route('program-kerjasama.update', $programKerjasama->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="mitra_kerjasama">Mitra Kerjasama</label>
    <input type="text" name="mitra_kerjasama" value="{{ $programKerjasama->mitra_kerjasama }}" required>

    <label for="tahun">Tahun</label>
    <input type="text" name="tahun" value="{{ $programKerjasama->tahun }}" required>

    <label for="jangka_waktu">Jangka Waktu</label>
    <input type="text" name="jangka_waktu" value="{{ $programKerjasama->jangka_waktu }}" required>

    <label for="tanggal_mulai">Tanggal Mulai</label>
    <input type="date" name="tanggal_mulai" value="{{ $programKerjasama->tanggal_mulai }}" required>

    <label for="tanggal_selesai">Tanggal Selesai</label>
    <input type="date" name="tanggal_selesai" value="{{ $programKerjasama->tanggal_selesai }}" required>

    <label for="tingkat">Tingkat</label>
    <input type="text" name="tingkat" value="{{ $programKerjasama->tingkat }}" required>

    <button type="submit">Update</button>
</form>


        <!-- Kembali Button -->
        <a href="{{ route('daftar.kerjasama.nasional') }}" class="btn btn-secondary mt-3">Kembali</a>
    </div>
@endsection
