<x-app-layout>
    <x-slot name="header">
        {{ __('Tambah Data Acara') }}
    </x-slot>

    <div class="p-4 bg-white rounded-lg shadow-xs">
        <form action="{{ route('acaras.store') }}" method="POST" enctype="multipart/form-data" x-data="{ gambarPreview: '' }">
            @csrf

            <div class="mb-4">
                <label for="nama_acara" class="block text-sm font-medium text-gray-700">Nama Acara</label>
                <input type="text" name="nama_acara" id="nama_acara" class="mt-1 block w-full"
                    placeholder="Nama Acara" required>
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

            <div class="mb-4">
                <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" class="mt-1 block w-full" rows="3" placeholder="Deskripsi" required></textarea>
            </div>

            <div class="mb-4">
                <label for="gambar" class="block text-sm font-medium text-gray-700">Gambar</label>
                <input type="file" name="gambar" id="gambar" class="mt-1 block w-full" required
                    @change="fileChosen">

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
                    placeholder="Estimasi Pengunjung" required>
            </div>

            <div class="mb-4">
                <label for="biaya_tiket" class="block text-sm font-medium text-gray-700">Biaya Tiket</label>
                <input type="number" name="biaya_tiket" id="biaya_tiket" class="mt-1 block w-full"
                    placeholder="Biaya Tiket" required>
            </div>

            <div class="mb-4">
                <label for="id_eo" class="block text-sm font-medium text-gray-700">Organizer</label>
                <select name="id_eo" id="id_eo" class="mt-1 block w-full" required>
                    <option value="">Pilih Organizer</option>
                    @foreach ($eventOrganizer as $eventOrganizer)
                        <option value="{{ $eventOrganizer->id }}">{{ $eventOrganizer->nama_organisasi }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="anggaran" class="block text-sm font-medium text-gray-700">Anggaran</label>
                <input type="number" name="anggaran" id="anggaran" class="mt-1 block w-full" placeholder="Anggaran"
                    required>
            </div>

            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg">Submit</button>
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
