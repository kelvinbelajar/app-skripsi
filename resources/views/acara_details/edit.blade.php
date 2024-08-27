<x-app-layout>
    <x-slot name="header">
        {{ __('Edit Acara Detail') }}
    </x-slot>

    <div class="p-4 bg-white rounded-lg shadow-xs">
        <!-- Form start -->
        <form action="{{ route('acara_details.update', $acaraDetail->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Event Organizer Dropdown -->
            <div class="mb-4">
                <label for="id_eo" class="block text-sm font-medium text-gray-700">Event Organizer</label>
                <select id="id_eo" name="id_eo"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                    <option value="">Select Event Organizer</option>
                    @foreach ($eventOrganizer as $event_organizer)
                        <option value="{{ $event_organizer->id }}" {{ $event_organizer->id == $acaraDetail->id_eo ? 'selected' : '' }}>
                            {{ $event_organizer->nama_organisasi }}
                        </option>
                    @endforeach
                </select>
                @error('id_eo')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Acara Dropdown -->
            <div class="mb-4">
                <label for="id_acara" class="block text-sm font-medium text-gray-700">Acara</label>
                <select id="id_acara" name="id_acara"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                    <option value="">Select Acara</option>
                    @foreach ($acara as $acara)
                        <option value="{{ $acara->id }}" {{ $acara->id == $acaraDetail->id_acara ? 'selected' : '' }}>
                            {{ $acara->nama_acara }} | {{ $acara->kategori }}
                        </option>
                    @endforeach
                </select>
                @error('id_acara')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Jadwal Dropdown -->
            <div class="mb-4">
                <label for="id_jadwal" class="block text-sm font-medium text-gray-700">Jadwal</label>
                <select id="id_jadwal" name="id_jadwal"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                    <option value="">Select Jadwal</option>
                    @foreach ($jadwal as $jadwal)
                        <option value="{{ $jadwal->id }}" {{ $jadwal->id == $acaraDetail->id_jadwal ? 'selected' : '' }}>
                            {{ $jadwal->tanggal_mulai }} -> {{ $jadwal->tanggal_akhir }}
                        </option>
                    @endforeach
                </select>
                @error('id_jadwal')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Lokasi Dropdown -->
            <div class="mb-4">
                <label for="id_lokasi" class="block text-sm font-medium text-gray-700">Lokasi</label>
                <select id="id_lokasi" name="id_lokasi"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                    <option value="">Select Lokasi</option>
                    @foreach ($lokasi as $lokasi)
                        <option value="{{ $lokasi->id }}" {{ $lokasi->id == $acaraDetail->id_lokasi ? 'selected' : '' }}>
                            {{ $lokasi->address }}
                        </option>
                    @endforeach
                </select>
                @error('id_lokasi')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="mb-4">
                <button type="submit"
                    class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue">
                    Update
                </button>
            </div>
        </form>
        <!-- End of Form -->
    </div>
</x-app-layout>
