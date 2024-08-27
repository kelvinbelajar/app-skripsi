<x-app-layout>
    <x-slot name="header">
        {{ __('Pengeluaran Details') }}
    </x-slot>

    <div class="p-4 bg-white rounded-lg shadow-xs">
        <div class="mb-4">
            <label for="id_acara" class="block text-sm font-medium text-gray-700">Acara</label>
            <input type="text" id="id_acara" class="mt-1 block w-full bg-gray-100 text-gray-700" value="{{ $pengeluaran->acara->nama_acara }}" readonly>
        </div>

        <div class="mb-4">
            <label for="tanggal_pengeluaran" class="block text-sm font-medium text-gray-700">Tanggal Pengeluaran</label>
            <input type="text" id="tanggal_pengeluaran" class="mt-1 block w-full bg-gray-100 text-gray-700" value="{{ $pengeluaran->tanggal_pengeluaran }}" readonly>
        </div>

        <div class="mb-4">
            <label for="nominal_pengeluaran" class="block text-sm font-medium text-gray-700">Nominal Pengeluaran</label>
            <input type="text" id="nominal_pengeluaran" class="mt-1 block w-full bg-gray-100 text-gray-700" value="{{ number_format($pengeluaran->nominal_pengeluaran, 2, ',', '.') }}" readonly>
        </div>

        <div class="mb-4">
            <label for="bukti_pengeluaran" class="block text-sm font-medium text-gray-700">Bukti Pengeluaran</label>
            @if ($pengeluaran->bukti_pengeluaran)
                <a href="{{ asset('storage/bukti_pengeluaran/' . $pengeluaran->bukti_pengeluaran) }}" target="_blank" class="text-blue-600 hover:underline text-lg font-semibold">View File</a>
            @else
                <p class="text-gray-600">No file uploaded</p>
            @endif
        </div>

        <a href="{{ route('pengeluarans.index') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg">Back to List</a>
    </div>
</x-app-layout>
