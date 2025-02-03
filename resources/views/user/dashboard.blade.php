@extends('layouts.app_modern')

@section('content')
    <div class="container py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-100 p-6 rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h5 class="text-xl font-semibold mb-4">Dashboard User</h5>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="bg-white p-4 shadow rounded">
                            <h6 class="text-lg font-semibold">Materi</h6>
                            <p class="text-2xl">{{ $totalMateri }}</p>
                            <a href="{{ route('admin.materi.index') }}" class="text-blue-500">Lihat Materi</a>
                        </div>
                        <div class="bg-green-200 p-4 shadow rounded">
                            <h6 class="text-lg font-semibold">Tugas</h6>
                            <p class="text-2xl">{{ $totalTugas }}</p>
                            <a href="{{ route('admin.tugas.index') }}" class="text-blue-500">Lihat Tugas</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
