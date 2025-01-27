@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h3>Detail Kelas</h3>
        </div>
        <div class="card-body">
            <h5>Nama Kelas: {{ $kelas->nama_kelas }}</h5>
            <h5>Guru: {{ $kelas->guru->nama }}</h5>

            <a href="{{ route('kelas.index') }}" class="btn btn-secondary mt-3">Kembali</a>
        </div>
    </div>
</div>
@endsection
