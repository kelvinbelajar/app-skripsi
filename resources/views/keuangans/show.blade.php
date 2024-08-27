<x-app-layout>
    <x-slot name="header">
        {{ __('Keuangan Details') }}
    </x-slot>

    <div class="p-4 bg-white rounded-lg shadow-xs">
        <div class="mb-4">
            <label for="tanggal_transaksi" class="block text-sm font-medium text-gray-700">Tanggal Transaksi</label>
            <input type="text" id="tanggal_transaksi" class="mt-1 block w-full bg-gray-100 text-gray-700" value="{{ $keuangan->tanggal_transaksi }}" readonly>
        </div>

        <div class="mb-4">
            <label for="pemasukan" class="block text-sm font-medium text-gray-700">Pemasukan</label>
            <input type="text" id="pemasukan" class="mt-1 block w-full bg-gray-100 text-gray-700" value="{{ $keuangan->pemasukan }}" readonly>
        </div>

        <div class="mb-4">
            <label for="pengeluaran" class="block text-sm font-medium text-gray-700">Pengeluaran</label>
            <input type="text" id="pengeluaran" class="mt-1 block w-full bg-gray-100 text-gray-700" value="{{ $keuangan->pengeluaran }}" readonly>
        </div>

        <a href="{{ route('keuangans.index') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg">Back to List</a>
    </div>
</x-app-layout>
