<x-app-layout>
    <x-slot name="header">
        {{ __('Edit Data Acara') }}
    </x-slot>

    <div class="p-4 bg-white rounded-lg shadow-xs">
        <form action="{{ route('acaras.update', $acara->id) }}" method="POST" enctype="multipart/form-data"
            x-data="{ gambarPreview: '{{ $acara->gambar ? asset('storage/acaras/' . $acara->gambar) : '' }}' }">
            @csrf
            @method('PUT') <!-- Indicates that this is a PUT request -->

            <div class="mb-4">
                <label for="nama_acara" class="block text-sm font-medium text-gray-700">Nama Acara</label>
                <input type="text" name="nama_acara" id="nama_acara" class="mt-1 block w-full"
                    value="{{ old('nama_acara', $acara->nama_acara) }}" placeholder="Nama Acara" required>
            </div>

            <div class="mb-4">
                <label for="kategori" class="block text-sm font-medium text-gray-700">Kategori</label>
                <select name="kategori" id="kategori" class="mt-1 block w-full" required>
                    <option value="" disabled>Pilih Kategori</option>
                    <option value="Pameran Seni" {{ $acara->kategori == 'Pameran Seni' ? 'selected' : '' }}>Pameran Seni</option>
                    <option value="Festival Musik" {{ $acara->kategori == 'Festival Musik' ? 'selected' : '' }}>Festival Musik</option>
                    <option value="Festival Tari" {{ $acara->kategori == 'Festival Tari' ? 'selected' : '' }}>Festival Tari</option>
                    <option value="Pertunjukan Teater" {{ $acara->kategori == 'Pertunjukan Teater' ? 'selected' : '' }}>Pertunjukan Teater</option>
                    <option value="Workshop Seni" {{ $acara->kategori == 'Workshop Seni' ? 'selected' : '' }}>Workshop Seni</option>
                    <option value="Pasar Seni" {{ $acara->kategori == 'Pasar Seni' ? 'selected' : '' }}>Pasar Seni</option>
                    <option value="Film Festival" {{ $acara->kategori == 'Film Festival' ? 'selected' : '' }}>Film Festival</option>
                    <option value="Kompetisi Seni" {{ $acara->kategori == 'Kompetisi Seni' ? 'selected' : '' }}>Kompetisi Seni</option>
                    <option value="Pertunjukan Seni Rupa" {{ $acara->kategori == 'Pertunjukan Seni Rupa' ? 'selected' : '' }}>Pertunjukan Seni Rupa</option>
                    <option value="Karnaval Parade" {{ $acara->kategori == 'Karnaval Parade' ? 'selected' : '' }}>Karnaval dan Parade</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" class="mt-1 block w-full" rows="3" placeholder="Deskripsi" required>{{ old('deskripsi', $acara->deskripsi) }}</textarea>
            </div>

            <div class="mb-4">
                <label for="gambar" class="block text-sm font-medium text-gray-700">Gambar</label>
                <input type="file" name="gambar" id="gambar" class="mt-1 block w-full" @change="fileChosen">

                <!-- Image Preview -->
                <div class="mt-2" x-show="gambarPreview">
                    <span class="block text-sm font-medium text-gray-700">Gambar Preview</span>
                    <img :src="gambarPreview" alt="Gambar Preview" class="mt-1 w-full max-w-xs rounded-lg">
                </div>
            </div>

            <div class="mb-4">
                <label for="estimasi_pengunjung" class="block text-sm font-medium text-gray-700">Estimasi
                    Pengunjung</label>
                <input type="number" name="estimasi_pengunjung" id="estimasi_pengunjung" class="mt-1 block w-full"
                    value="{{ old('estimasi_pengunjung', $acara->estimasi_pengunjung) }}"
                    placeholder="Estimasi Pengunjung" required>
            </div>

            <div class="mb-4">
                <label for="biaya_tiket" class="block text-sm font-medium text-gray-700">Biaya Tiket</label>
                <input type="number" name="biaya_tiket" id="biaya_tiket" class="mt-1 block w-full"
                    value="{{ old('biaya_tiket', $acara->biaya_tiket) }}" placeholder="Biaya Tiket" required>
            </div>

            <div class="mb-4">
                <label for="id_eo" class="block text-sm font-medium text-gray-700">Organizer</label>
                <select name="id_eo" id="id_eo" class="mt-1 block w-full" required>
                    <option value="">Pilih Organizer</option>
                    @foreach ($eventOrganizer as $organizer)
                        <option value="{{ $organizer->id }}" {{ $organizer->id == $acara->id_eo ? 'selected' : '' }}>
                            {{ $organizer->nama_organisasi }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="anggaran" class="block text-sm font-medium text-gray-700">Anggaran</label>
                <input type="number" name="anggaran" id="anggaran" class="mt-1 block w-full"
                    value="{{ old('anggaran', $acara->anggaran) }}" placeholder="Anggaran" required>
            </div>

            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg">Update</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script>
        function fileChosen(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    this.gambarPreview = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        }
    </script>
</x-app-layout>
