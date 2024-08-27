<x-app-layout>
    <x-slot name="header">
        {{ __('Detail Jadwal') }}
    </x-slot>

    <div class="p-4 bg-white rounded-lg shadow-xs">
        <form method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="acara" class="block text-sm font-medium text-gray-700">Acara</label>
                <input type="text" name="acara" id="acara" class="mt-1 block w-full" 
                    value="{{ $jadwal->acara->nama_acara }}" readonly>
            </div>

            <div class="mb-4">
                <label for="tanggal_mulai" class="block text-sm font-medium text-gray-700">Tanggal Mulai</label>
                <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="mt-1 block w-full"
                    value="{{ $jadwal->tanggal_mulai }}" readonly>
            </div>

            <div class="mb-4">
                <label for="tanggal_akhir" class="block text-sm font-medium text-gray-700">Tanggal Akhir</label>
                <input type="date" name="tanggal_akhir" id="tanggal_akhir" class="mt-1 block w-full"
                    value="{{ $jadwal->tanggal_akhir }}" readonly>
            </div>

            <div class="mb-4">
                <label for="waktu_mulai" class="block text-sm font-medium text-gray-700">Waktu Mulai</label>
                <input type="time" name="waktu_mulai" id="waktu_mulai" class="mt-1 block w-full"
                    value="{{ $jadwal->waktu_mulai }}" readonly>
            </div>

            <div class="mb-4">
                <label for="waktu_akhir" class="block text-sm font-medium text-gray-700">Waktu Akhir</label>
                <input type="time" name="waktu_akhir" id="waktu_akhir" class="mt-1 block w-full"
                    value="{{ $jadwal->waktu_akhir }}" readonly>
            </div>

            <div class="flex justify-between mt-4">
                <a href="{{ route('jadwals.index') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg">Back to List</a>

                
            </div>
        </form>
    </div>
</x-app-layout>
