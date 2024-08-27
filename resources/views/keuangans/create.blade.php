<x-app-layout>
    <x-slot name="header">
        {{ __('Tambah Data Keuangan') }}
    </x-slot>

    <div class="p-4 bg-white rounded-lg shadow-xs">
        <form action="{{ route('keuangans.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="tanggal_transaksi" class="block text-sm font-medium text-gray-700">Tanggal Transaksi</label>
                <input type="date" name="tanggal_transaksi" id="tanggal_transaksi" class="mt-1 block w-full" placeholder="Tanggal Transaksi" required>
            </div>

            <div class="mb-4">
                <label for="pemasukan" class="block text-sm font-medium text-gray-700">Pemasukan</label>
                <input type="number" name="pemasukan" id="pemasukan" class="mt-1 block w-full" placeholder="Pemasukan" required>
            </div>

            <div class="mb-4">
                <label for="pengeluaran" class="block text-sm font-medium text-gray-700">Pengeluaran</label>
                <input type="number" name="pengeluaran" id="pengeluaran" class="mt-1 block w-full" placeholder="Pengeluaran" required>
            </div>

            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg">Submit</button>
        </form>
    </div>
</x-app-layout>
