<x-app-layout>
    <x-slot name="header">
        {{ __('Booking Ticket Details') }}
    </x-slot>

    <div class="p-4 bg-white rounded-lg shadow-xs">
        <div class="mb-4">
            <label for="id_acara" class="block text-sm font-medium text-gray-700">Acara</label>
            <input type="text" id="id_acara" class="mt-1 block w-full bg-gray-100 text-gray-700" value="{{ $bookingTiket->acara->nama_acara }}" readonly>
        </div>

        <div class="mb-4">
            <label for="nama_lengkap" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
            <input type="text" id="nama_lengkap" class="mt-1 block w-full bg-gray-100 text-gray-700" value="{{ $bookingTiket->nama_lengkap }}" readonly>
        </div>

        <div class="mb-4">
            <label for="notelp" class="block text-sm font-medium text-gray-700">No Telp</label>
            <input type="text" id="notelp" class="mt-1 block w-full bg-gray-100 text-gray-700" value="{{ $bookingTiket->notelp }}" readonly>
        </div>

        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" id="email" class="mt-1 block w-full bg-gray-100 text-gray-700" value="{{ $bookingTiket->email }}" readonly>
        </div>

            <div class="mb-4">
                <label for="bukti_bayar" class="block text-sm font-medium text-gray-700">Bukti Bayar</label>
                @if ($bookingTiket->bukti_bayar)
                    <a href="{{ asset('storage/bukti_bayar/' . $bookingTiket->bukti_bayar) }}" target="_blank" class="text-blue-600 hover:underline text-lg font-semibold">View File</a>
                @else
                    <p class="text-gray-600">No file uploaded</p>
                @endif
            </div>
            

        <a href="{{ route('booking_tikets.index') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg">Back to List</a>
    </div>
</x-app-layout>
