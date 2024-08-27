<x-app-layout>
    <x-slot name="header">
        {{ __('Edit Data Jadwal') }}
    </x-slot>

    <div class="p-4 bg-white rounded-lg shadow-xs">
        <form action="{{ route('jadwals.update', $jadwal->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="id_acara" class="block text-sm font-medium text-gray-700">Acara</label>
                <select name="id_acara" id="id_acara" class="mt-1 block w-full" required>
                    <option value="">Pilih Acara</option>
                    @foreach ($acaras as $acara)
                        <option value="{{ $acara->id }}" {{ $acara->id == $jadwal->id_acara ? 'selected' : '' }}>
                            {{ $acara->nama_acara }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="tanggal_mulai" class="block text-sm font-medium text-gray-700">Tanggal Mulai</label>
                <input type="date" name="tanggal_mulai" id="tanggal_mulai" value="{{ $jadwal->tanggal_mulai }}" class="mt-1 block w-full" required>
            </div>

            <div class="mb-4">
                <label for="tanggal_akhir" class="block text-sm font-medium text-gray-700">Tanggal Akhir</label>
                <input type="date" name="tanggal_akhir" id="tanggal_akhir" value="{{ $jadwal->tanggal_akhir }}" class="mt-1 block w-full" required>
            </div>

            <div class="mb-4">
                <label for="waktu_mulai" class="block text-sm font-medium text-gray-700">Waktu Mulai</label>
                <input type="time" name="waktu_mulai" id="waktu_mulai" value="{{ $jadwal->waktu_mulai }}" class="mt-1 block w-full" required>
            </div>

            <div class="mb-4">
                <label for="waktu_akhir" class="block text-sm font-medium text-gray-700">Waktu Akhir</label>
                <input type="time" name="waktu_akhir" id="waktu_akhir" value="{{ $jadwal->waktu_akhir }}" class="mt-1 block w-full" required>
            </div>

            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg">Update</button>
        </form>
    </div>
</x-app-layout>
