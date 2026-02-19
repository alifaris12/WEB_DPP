@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Kerjasama</h2>
    <a href="{{ url('/program-kerjasama/input') }}" class="btn btn-success">+ Tambah Kerjasama</a>

    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Jenis</th>
                <th>Mitra</th>
                <th>Tahun</th>
                <th>Jangka Waktu</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Selesai</th>
                <th>Tingkat</th>
            </tr>
        </thead>
        <tbody>
            @foreach($programs as $program)
            <tr>
                <td>{{ $program->jenis }}</td>
                <td>{{ $program->mitra }}</td>
                <td>{{ $program->tahun }}</td>
                <td>{{ $program->jangka_waktu }}</td>
                <td>{{ $program->tanggal_mulai }}</td>
                <td>{{ $program->tanggal_selesai }}</td>
                <td>{{ ucfirst($program->tingkat) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="pagination-wrapper" style="margin-top: 30px; display: flex; flex-direction: column; align-items: center; gap: 15px;">
        <span style="color: #6b7280; font-size: 14px; font-weight: 500; text-align: center;">
            Menampilkan {{ $programs->firstItem() }} sampai {{ $programs->lastItem() }} dari {{ $programs->total() }} hasil
        </span>
        {{ $programs->links('vendor.pagination.custom') }}
    </div>
</div>
@endsection
