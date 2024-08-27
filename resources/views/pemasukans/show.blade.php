<x-app-layout>
    <x-slot name="header">
        {{ __('Pemasukan Details') }}
    </x-slot>

    <div class="p-4 bg-white rounded-lg shadow-xs">
        <div class="mb-4">
            <label for="id_acara" class="block text-sm font-medium text-gray-700">Acara</label>
            <input type="text" id="id_acara" class="mt-1 block w-full bg-gray-100 text-gray-700" value="{{ $pemasukan->acara->nama_acara }}" readonly>
        </div>

        <div class="mb-4">
            <label for="tanggal_pemasukan" class="block text-sm font-medium text-gray-700">Tanggal Pemasukan</label>
            <input type="text" id="tanggal_pemasukan" class="mt-1 block w-full bg-gray-100 text-gray-700" value="{{ $pemasukan->tanggal_pemasukan }}" readonly>
        </div>

        <div class="mb-4">
            <label for="nominal_pemasukan" class="block text-sm font-medium text-gray-700">Nominal Pemasukan</label>
            <input type="text" id="nominal_pemasukan" class="mt-1 block w-full bg-gray-100 text-gray-700" value="{{ number_format($pemasukan->nominal_pemasukan, 2, ',', '.') }}" readonly>
        </div>

        <div class="mb-4">
            <label for="bukti_pemasukan" class="block text-sm font-medium text-gray-700">Bukti Pemasukan</label>
            @if ($pemasukan->bukti_pemasukan)
                <a href="{{ asset('storage/bukti_pemasukan/' . $pemasukan->bukti_pemasukan) }}" target="_blank" class="text-blue-600 hover:underline text-lg font-semibold">View File</a>
            @else
                <p class="text-gray-600">No file uploaded</p>
            @endif
        </div>

        <a href="{{ route('pemasukans.index') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg">Back to List</a>
    </div>
</x-app-layout>
