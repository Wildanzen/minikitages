{{-- @extends('layouts.app_modern')

@section('content')
<div class="container py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <h2 class="text-2xl font-semibold mb-6">Tambah Materi</h2>

                <form action="{{ route('admin.materi.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="judul_materi" class="block text-sm font-medium text-gray-700">Judul Materi</label>
                        <input type="text" name="judul_materi" id="judul_materi"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>
                    <div class="mb-4">
                        <label for="konten" class="block text-sm font-medium text-gray-700">Konten</label>
                        <textarea name="konten" id="konten"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="kelas_id" class="block text-sm font-medium text-gray-700">Kelas</label>
                        <select name="kelas_id" id="kelas_id"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            @foreach($kelas as $kelasItem)
                                <option value="{{ $kelasItem->id }}">{{ $kelasItem->nama_kelas }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Simpan</button>
                    <a href="{{ route('admin.materi.index') }}" class="btn btn-warning ms-3">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection --}}
