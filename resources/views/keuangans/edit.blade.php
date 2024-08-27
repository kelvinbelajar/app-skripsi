<x-app-layout>
    <x-slot name="header">
        {{ __('Edit Data Keuangan') }}
    </x-slot>

    <div class="p-4 bg-white rounded-lg shadow-xs">
        <form action="{{ route('keuangans.update', $keuangan->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="tanggal_transaksi" class="block text-sm font-medium text-gray-700">Tanggal Transaksi</label>
                <input type="date" name="tanggal_transaksi" id="tanggal_transaksi" class="mt-1 block w-full" value="{{ old('tanggal_transaksi', $keuangan->tanggal_transaksi) }}" required>
            </div>

            <div class="mb-4">
                <label for="pemasukan" class="block text-sm font-medium text-gray-700">Pemasukan</label>
                <input type="number" name="pemasukan" id="pemasukan" class="mt-1 block w-full" placeholder="Pemasukan" value="{{ old('pemasukan', $keuangan->pemasukan) }}" required>
            </div>

            <div class="mb-4">
                <label for="pengeluaran" class="block text-sm font-medium text-gray-700">Pengeluaran</label>
                <input type="number" name="pengeluaran" id="pengeluaran" class="mt-1 block w-full" placeholder="Pengeluaran" value="{{ old('pengeluaran', $keuangan->pengeluaran) }}" required>
            </div>

            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg">Update</button>
        </form>
    </div>
</x-app-layout>
