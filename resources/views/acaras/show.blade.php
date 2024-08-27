<x-app-layout>
    <x-slot name="header">
        {{ __('Detail Data Acara') }}
    </x-slot>

    <div class="p-4 bg-white rounded-lg shadow-xs">
        <form method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="nama_acara" class="block text-sm font-medium text-gray-700">Nama Acara</label>
                <input type="text" name="nama_acara" id="nama_acara" class="mt-1 block w-full" 
                    value="{{ $acara->nama_acara }}" readonly>
            </div>

            <div class="mb-4">
                <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" class="mt-1 block w-full" rows="3" readonly>{{ $acara->deskripsi }}</textarea>
            </div>

            <div class="mb-4">
                <label for="gambar" class="block text-sm font-medium text-gray-700">Gambar</label>
                @if ($acara->gambar)
                    <img src="{{ asset('storage/acaras/' . $acara->gambar) }}" alt="Gambar Acara" class="mt-1 w-full max-w-xs rounded-lg">
                @else
                    <p class="mt-1 text-gray-900">No image available</p>
                @endif
            </div>

            <div class="mb-4">
                <label for="estimasi_pengunjung" class="block text-sm font-medium text-gray-700">Estimasi Pengunjung</label>
                <input type="number" name="estimasi_pengunjung" id="estimasi_pengunjung" class="mt-1 block w-full"
                    value="{{ $acara->estimasi_pengunjung }}" readonly>
            </div>

            <div class="mb-4">
                <label for="biaya_tiket" class="block text-sm font-medium text-gray-700">Biaya Tiket</label>
                <input type="number" name="biaya_tiket" id="biaya_tiket" class="mt-1 block w-full"
                    value="{{ $acara->biaya_tiket }}" readonly>
            </div>

            <div class="mb-4">
                <label for="id_eo" class="block text-sm font-medium text-gray-700">Organizer</label>
                <input type="text" name="id_eo" id="id_eo" class="mt-1 block w-full"
                    value="{{ $acara->event_organizer->nama_organisasi }}" readonly>
            </div>

            <div class="mb-4">
                <label for="anggaran" class="block text-sm font-medium text-gray-700">Anggaran</label>
                <input type="number" name="anggaran" id="anggaran" class="mt-1 block w-full"
                    value="{{ $acara->anggaran }}" readonly>
            </div>

            <div class="flex justify-between mt-4">
                <a href="{{ route('acaras.index') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg">Back to List</a>
                
            </div>
        </form>
    </div>
</x-app-layout>
