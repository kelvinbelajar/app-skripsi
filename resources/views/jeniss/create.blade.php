<x-app-layout>
    <x-slot name="header">
        {{ __('Tambah Data Jadwal') }}
    </x-slot>

    <div class="p-4 bg-white rounded-lg shadow-xs">
        <form action="{{ route('jeniss.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="id_acara" class="block text-sm font-medium text-gray-700">Acara</label>
                <select name="id_acara" id="id_acara" class="mt-1 block w-full" required>
                    <option value="">Pilih Acara</option>
                    @foreach ($acaras as $acara)
                        <option value="{{ $acara->id }}">{{ $acara->nama_acara }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="kategori" class="block text-sm font-medium text-gray-700">Kategori</label>
                <select name="kategori" id="kategori" class="mt-1 block w-full" required>
                    <option value="" disabled selected>Pilih Kategori</option>
                    <option value="Pameran Seni">Pameran Seni</option>
                    <option value="Festival Musik">Festival Musik</option>
                    <option value="Festival Tari">Festival Tari</option>
                    <option value="Pertunjukan Teater">Pertunjukan Teater</option>
                    <option value="Workshop Seni">Workshop Seni</option>
                    <option value="Pasar Seni">Pasar Seni</option>
                    <option value="Film Festival">Film Festival</option>
                    <option value="Kompetisi Seni">Kompetisi Seni</option>
                    <option value="Pertunjukan Seni Rupa">Pertunjukan Seni Rupa</option>
                    <option value="Karnaval dan Parade">Karnaval dan Parade</option>
                </select>
            </div>
            
            

            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg">Submit</button>
        </form>
    </div>
</x-app-layout>