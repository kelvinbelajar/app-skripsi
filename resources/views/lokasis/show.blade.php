<x-app-layout>
    <x-slot name="header">
        {{ __('Show Data Lokasi') }}
    </x-slot>

    <div class="p-4 bg-white rounded-lg shadow-xs">
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
            <!-- Informasi Lokasi -->
            <div>
                <p class="block text-sm font-medium text-gray-700">Nama Acara</p>
                <p class="block text-lg font-semibold text-gray-900">{{ $lokasi->acaras->nama_acara }}</p>
            </div>
            <div>
                <p class="block text-sm font-medium text-gray-700">Alamat</p>
                <p class="block text-lg font-semibold text-gray-900">{{ $lokasi->address }}</p>
            </div>
            <div>
                <p class="block text-sm font-medium text-gray-700">Provinsi</p>
                <p class="block text-lg font-semibold text-gray-900">{{ $lokasi->province->name }}</p>
            </div>
            <div>
                <p class="block text-sm font-medium text-gray-700">Kabupaten/Kota</p>
                <p class="block text-lg font-semibold text-gray-900">{{ $lokasi->regency->name }}</p>
            </div>
            <div>
                <p class="block text-sm font-medium text-gray-700">Kecamatan</p>
                <p class="block text-lg font-semibold text-gray-900">{{ $lokasi->district->name }}</p>
            </div>
            <div>
                <p class="block text-sm font-medium text-gray-700">Kelurahan/Desa</p>
                <p class="block text-lg font-semibold text-gray-900">{{ $lokasi->village->name }}</p>
            </div>
            <div>
                <p class="block text-sm font-medium text-gray-700">Latitude</p>
                <p class="block text-lg font-semibold text-gray-900">{{ $lokasi->latitude }}</p>
            </div>
            <div>
                <p class="block text-sm font-medium text-gray-700">Longitude</p>
                <p class="block text-lg font-semibold text-gray-900">{{ $lokasi->longitude }}</p>
            </div>

            <!-- Map Section -->
            <div class="col-span-2 mt-6">
                <p class="block text-sm font-medium text-gray-700">Lokasi</p>
                <div id="map" style="height: 400px;" class="mt-2"></div>
            </div>

            <!-- Tombol Kembali -->
            <div class="flex justify-between mt-4">
                <a href="{{ route('lokasis.index') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg">Back to List</a>
                
                </a>
            </div>
        </div>
        
    </div>

    <!-- Include Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />

    <!-- Include Leaflet JavaScript -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <!-- Initialize Leaflet Map -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var map = L.map('map').setView([{{ $lokasi->latitude }}, {{ $lokasi->longitude }}], 13);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
            }).addTo(map);

            var marker = L.marker([{{ $lokasi->latitude }}, {{ $lokasi->longitude }}]).addTo(map);
        });
    </script>
</x-app-layout>
