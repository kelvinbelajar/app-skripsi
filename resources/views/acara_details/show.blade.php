<x-app-layout>
    <x-slot name="header">
      {{ __('Show Map Acara') }}
    </x-slot>
  
    <div class="p-4 bg-white rounded-lg shadow-xs">
      <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
        <!-- Informasi Laporan -->
        
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
        
        <div class="col-span-2">
          <p class="block text-sm font-medium text-gray-700">Alamat Pelanggaran</p>
          <p class="block text-lg font-semibold text-gray-900">{{ $lokasi->address }}</p>
        </div>
  
        
  
      <!-- Map Section -->
      <div class="col-span-2 mt-6">
        <p class="block text-sm font-medium text-gray-700">Lokasi Pelanggaran</p>
        <div id="map" style="height: 400px;" class="mt-2"></div>
      </div>
  
      <!-- Tombol Kembali -->
      <div class="flex justify-end mt-4">
        <a href="{{ route('acara_details.index') }}"
          class="px-4 py-2 text-sm font-medium leading-5 text-gray-700 transition-colors duration-150 bg-white border border-gray-300 rounded-lg active:bg-gray-100 hover:bg-gray-200 focus:outline-none focus:shadow-outline-gray">
          Kembali
        </a>
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
        var map = L.map('map').setView([{{ $lokasi->latitude }}, {{ $lokasi->longitude }}],
          13);
  
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
          maxZoom: 19,
        }).addTo(map);
  
        var marker = L.marker([{{ $lokasi->latitude }}, {{ $lokasi->longitude }}]).addTo(map);
      });
    </script>
  </x-app-layout>
  