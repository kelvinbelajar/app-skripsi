<x-app-layout>
    <x-slot name="header">
        {{ __('Update Data Jenis') }}
    </x-slot>

    <div class="p-4 bg-white rounded-lg shadow-xs">
        <form action="{{ route('jenis.update', $jenis->id) }}" method="POST">
            @method('PUT')
            @csrf

            <div class="mb-4">
                <label for="id_acara" class="block text-sm font-medium text-gray-700">Acara</label>
                <select name="id_acara" id="id_acara" class="mt-1 block w-full" required>
                    @foreach ($acaras as $acara)
                        <option value="{{ $acara->id }}" {{ $acara->id == $jenis->id_acara ? 'selected' : '' }}>
                            {{ $acara->nama_acara }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="kategori" class="block text-sm font-medium text-gray-700">Kategori</label>
                <select name="kategori" id="kategori" class="mt-1 block w-full" required>
                    <option value="" disabled>Pilih Kategori</option>
                    <option value="Pameran Seni" {{ $jenis->kategori == 'Pameran Seni' ? 'selected' : '' }}>Pameran Seni</option>
                    <option value="Festival Musik" {{ $jenis->kategori == 'Festival Musik' ? 'selected' : '' }}>Festival Musik</option>
                    <option value="Festival Tari" {{ $jenis->kategori == 'Festival Tari' ? 'selected' : '' }}>Festival Tari</option>
                    <option value="Pertunjukan Teater" {{ $jenis->kategori == 'Pertunjukan Teater' ? 'selected' : '' }}>Pertunjukan Teater</option>
                    <option value="Workshop Seni" {{ $jenis->kategori == 'Workshop Seni' ? 'selected' : '' }}>Workshop Seni</option>
                    <option value="Pasar Seni" {{ $jenis->kategori == 'Pasar Seni' ? 'selected' : '' }}>Pasar Seni</option>
                    <option value="Film Festival" {{ $jenis->kategori == 'Film Festival' ? 'selected' : '' }}>Film Festival</option>
                    <option value="Kompetisi Seni" {{ $jenis->kategori == 'Kompetisi Seni' ? 'selected' : '' }}>Kompetisi Seni</option>
                    <option value="Pertunjukan Seni Rupa" {{ $jenis->kategori == 'Pertunjukan Seni Rupa' ? 'selected' : '' }}>Pertunjukan Seni Rupa</option>
                    <option value="Karnaval Parade" {{ $jenis->kategori == 'Karnaval Parade' ? 'selected' : '' }}>Karnaval dan Parade</option>
                </select>
            </div>
            
            

            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg">Update</button>
        </form>
    </div>
</x-app-layout>
