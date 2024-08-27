<x-app-layout>
    <x-slot name="header">
      {{ __('Edit Lokasi') }}
    </x-slot>
  
    <div class="p-4 bg-white rounded-lg shadow-lg">
      <!-- Include Leaflet CSS -->
      <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
  
      <form action="{{ route('lokasis.update', $lokasi->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
          <label for="id_acara" class="block text-sm font-medium text-gray-700">Acara</label>
          <select id="id_acara" name="id_acara" required
            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            <option value="">Pilih Acara</option>
            @foreach ($acaras as $acara)
              <option value="{{ $acara->id }}" {{ $lokasi->id_acara == $acara->id ? 'selected' : '' }}>
                {{ $acara->nama_acara }}
              </option>
            @endforeach
          </select>
          @error('id_acara')
            <p class="text-sm text-red-600">{{ $message }}</p>
          @enderror
  
          <div class="grid grid-cols-1 gap-6 sm:grid-cols-4">
            <div>
              <label for="provinsi" class="block text-sm font-medium text-gray-700">Provinsi</label>
              <select id="provinsi" name="province_id" required
                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <option value="">Pilih Provinsi</option>
                @foreach ($provinces as $provinsi)
                  <option value="{{ $provinsi->id }}" {{ $lokasi->province_id == $provinsi->id ? 'selected' : '' }}>
                    {{ $provinsi->name }}
                  </option>
                @endforeach
              </select>
              @error('province_id')
                <p class="text-sm text-red-600">{{ $message }}</p>
              @enderror
            </div>
  
            <div>
              <label for="regency_id" class="block text-sm font-medium text-gray-700">Kabupaten/Kota</label>
              <select id="regency_id" name="regency_id" required
                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <option value="">Pilih Kabupaten/Kota</option>
                @foreach ($regencies as $regency)
                  <option value="{{ $regency->id }}" {{ $lokasi->regency_id == $regency->id ? 'selected' : '' }}>
                    {{ $regency->name }}
                  </option>
                @endforeach
              </select>
              @error('regency_id')
                <p class="text-sm text-red-600">{{ $message }}</p>
              @enderror
            </div>
  
            <div>
              <label for="district_id" class="block text-sm font-medium text-gray-700">Kecamatan</label>
              <select id="district_id" name="district_id" required
                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <option value="">Pilih Kecamatan</option>
                @foreach ($districts as $district)
                  <option value="{{ $district->id }}" {{ $lokasi->district_id == $district->id ? 'selected' : '' }}>
                    {{ $district->name }}
                  </option>
                @endforeach
              </select>
              @error('district_id')
                <p class="text-sm text-red-600">{{ $message }}</p>
              @enderror
            </div>
  
            <div>
              <label for="village_id" class="block text-sm font-medium text-gray-700">Kelurahan/Desa</label>
              <select id="village_id" name="village_id" required
                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <option value="">Pilih Kelurahan/Desa</option>
                @foreach ($villages as $village)
                  <option value="{{ $village->id }}" {{ $lokasi->village_id == $village->id ? 'selected' : '' }}>
                    {{ $village->name }}
                  </option>
                @endforeach
              </select>
              @error('village_id')
                <p class="text-sm text-red-600">{{ $message }}</p>
              @enderror
            </div>
          </div>
  
          {{-- Input field for alamat --}}
          <div class="mt-6">
            <label for="address" class="block text-sm font-medium text-gray-700">Alamat</label>
            <textarea id="address" name="address" rows="3" required
              class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
              placeholder="Alamat">{{ $lokasi->address }}</textarea>
            @error('address')
              <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
          </div>
  
          {{-- Hidden fields for latitude and longitude --}}
          <input type="hidden" id="latitude" name="latitude" value="{{ $lokasi->latitude }}" required>
          <input type="hidden" id="longitude" name="longitude" value="{{ $lokasi->longitude }}" required>
          @error('latitude')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
          @enderror
          @error('longitude')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
          @enderror
  
          {{-- Maps --}}
          <div class="mt-6">
            <div id="map" style="height: 400px;"></div>
          </div>
  
          <div class="flex justify-end mt-4">
            <button type="submit"
              class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue">
              Update
            </button>
            <a href="{{ route('lokasis.index') }}"
              class="px-4 py-2 text-sm font-medium leading-5 text-gray-700 transition-colors duration-150 bg-white border border-gray-300 rounded-lg active:bg-gray-100 hover:bg-gray-200 focus:outline-none focus:shadow-outline-gray">
              Kembali
            </a>
          </div>
        </div>
      </form>
    </div>
    <!-- Include Leaflet JavaScript -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
      integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
  
    <!-- Initialize Leaflet Map -->
    <script>
      var initialLat = {{ $lokasi->latitude ?? -3.316694 }};
      var initialLng = {{ $lokasi->longitude ?? 114.590111 }};
      var map = L.map('map').setView([initialLat, initialLng], 13);
  
      L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
      }).addTo(map);
  
      var marker = L.marker([initialLat, initialLng]).addTo(map);
  
      function updateLatLng(lat, lng) {
        document.getElementById('latitude').value = lat;
        document.getElementById('longitude').value = lng;
      }
  
      map.on('click', function(e) {
        if (marker) {
          map.removeLayer(marker);
        }
        marker = L.marker(e.latlng).addTo(map);
        updateLatLng(e.latlng.lat, e.latlng.lng);
      });
    </script>
  
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  
    <script>
      $(document).ready(function() {
        $('#provinsi').change(function() {
          var province_id = $(this).val();
          $('#regency_id').empty().append('<option value="">Pilih Kabupaten/Kota</option>');
          $('#district_id').empty().append('<option value="">Pilih Kecamatan</option>');
          $('#village_id').empty().append('<option value="">Pilih Kelurahan/Desa</option>');
  
          if (province_id) {
            $.getJSON('/get-regency/' + province_id, function(data) {
              $.each(data, function(index, value) {
                $('#regency_id').append('<option value="' + value.id + '">' + value.name + '</option>');
              });
            });
          }
        });
  
        $('#regency_id').change(function() {
          var regency_id = $(this).val();
          $('#district_id').empty().append('<option value="">Pilih Kecamatan</option>');
          $('#village_id').empty().append('<option value="">Pilih Kelurahan/Desa</option>');
  
          if (regency_id) {
            $.getJSON('/get-districts/' + regency_id, function(data) {
              $.each(data, function(index, value) {
                $('#district_id').append('<option value="' + value.id + '">' + value.name + '</option>');
              });
            });
          }
        });
  
        $('#district_id').change(function() {
          var district_id = $(this).val();
          $('#village_id').empty().append('<option value="">Pilih Kelurahan/Desa</option>');
  
          if (district_id) {
            $.getJSON('/get-villages/' + district_id, function(data) {
              $.each(data, function(index, value) {
                $('#village_id').append('<option value="' + value.id + '">' + value.name + '</option>');
              });
            });
          }
        });
      });
    </script>
  
  </x-app-layout>
  