<x-app-layout>
    <x-slot name="header">
        {{ __('Edit Pengeluaran') }}
    </x-slot>

    <div class="p-4 bg-white rounded-lg shadow-xs">
        <!-- Alert section -->
        @if (session('success'))
            <div id="alert-success" class="inline-flex overflow-hidden mb-4 w-full bg-white rounded-lg shadow-md">
                <div class="flex justify-center items-center w-12 bg-blue-500">
                    <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM21.6667 28.3333H18.3334V25H21.6667V28.3333ZM21.6667 21.6666H18.3334V11.6666H21.6667V21.6666Z"></path>
                    </svg>
                </div>
                <div class="px-4 py-2 -mx-3">
                    <div class="mx-3">
                        <span class="font-semibold text-blue-500">Success</span>
                        <p class="text-sm text-gray-600">{{ session('success') }}</p>
                    </div>
                </div>
            </div>
        @elseif(session('error'))
            <div id="alert-error" class="inline-flex overflow-hidden mb-4 w-full bg-white rounded-lg shadow-md">
                <div class="flex justify-center items-center w-12 bg-red-500">
                    <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM21.6667 28.3333H18.3334V25H21.6667V28.3333ZM21.6667 21.6666H18.3334V11.6666H21.6667V21.6666Z"></path>
                    </svg>
                </div>
                <div class="px-4 py-2 -mx-3">
                    <div class="mx-3">
                        <span class="font-semibold text-red-500">Error</span>
                        <p class="text-sm text-gray-600">{{ session('error') }}</p>
                    </div>
                </div>
            </div>
        @endif
        <!-- End of alert section -->

        <form action="{{ route('pengeluarans.update', $pengeluaran->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="id_acara" class="block text-sm font-medium text-gray-700">Acara</label>
                <select id="id_acara" name="id_acara" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                    <option value="">Select Acara</option>
                    @foreach ($acaras as $acara)
                        <option value="{{ $acara->id }}" {{ $pengeluaran->id_acara == $acara->id ? 'selected' : '' }}>
                            {{ $acara->nama_acara }}
                        </option>
                    @endforeach
                </select>
                @error('id_acara')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="tanggal_pengeluaran" class="block text-sm font-medium text-gray-700">Tanggal Pengeluaran</label>
                <input type="date" id="tanggal_pengeluaran" name="tanggal_pengeluaran" value="{{ $pengeluaran->tanggal_pengeluaran }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                @error('tanggal_pengeluaran')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="nominal_pengeluaran" class="block text-sm font-medium text-gray-700">Nominal Pengeluaran</label>
                <input type="number" id="nominal_pengeluaran" name="nominal_pengeluaran" value="{{ $pengeluaran->nominal_pengeluaran }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                @error('nominal_pengeluaran')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="bukti_pengeluaran" class="block text-sm font-medium text-gray-700">Bukti Pengeluaran</label>
                <input type="file" id="bukti_pengeluaran" name="bukti_pengeluaran" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                @error('bukti_pengeluaran')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
                @if ($pengeluaran->bukti_pengeluaran)
                    <p class="mt-2 text-sm text-gray-600">Current file: <a href="{{ asset('storage/bukti_pengeluaran/' . $pengeluaran->bukti_pengeluaran) }}" target="_blank" class="text-blue-600 hover:underline">View Current File</a></p>
                @endif
            </div>

            <div class="flex justify-end">
                <button type="submit" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue">
                    Update
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
