@extends('layouts.app_modern')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h3>Edit Kelas</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.kelas.update', $kelas->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nama_kelas" class="form-label">Nama Kelas</label>
                    <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" value="{{ $kelas->nama_kelas }}" required>
                </div>
                <div class="mb-3">
                    <label for="guru_id" class="form-label">Guru</label>
                    <select class="form-control" id="guru_id" name="guru_id" required>
                        @foreach ($guru as $g)
                            <option value="{{ $g->id }}" {{ $g->id == $kelas->guru_id ? 'selected' : '' }}>{{ $g->nama_guru }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Perbarui</button>
                 <a href="{{ route('admin.kelas.index') }}" class="btn btn-warning ms-3">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
