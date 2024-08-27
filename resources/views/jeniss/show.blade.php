<x-app-layout>
    <x-slot name="header">
        {{ __('View Data Jenis') }}
    </x-slot>

    <div class="p-4 bg-white rounded-lg shadow-xs">
        <form action="#" method="POST">
            @csrf
            @method('GET')

            <div class="mb-4">
                <label for="id_acara" class="block text-sm font-medium text-gray-700">Acara</label>
                <select name="id_acara" id="id_acara" class="mt-1 block w-full" disabled>
                    @foreach ($acaras as $acara)
                        <option value="{{ $acara->id }}" {{ $acara->id == $jenis->id_acara ? 'selected' : '' }}>
                            {{ $acara->nama_acara }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="kategori" class="block text-sm font-medium text-gray-700">Kategori</label>
                <select name="kategori" id="kategori" class="mt-1 block w-full" disabled>
                    <option value="1" {{ $jenis->kategori == '1' ? 'selected' : '' }}>Kategori 1</option>
                    <option value="2" {{ $jenis->kategori == '2' ? 'selected' : '' }}>Kategori 2</option>
                    <option value="3" {{ $jenis->kategori == '3' ? 'selected' : '' }}>Kategori 3</option>
                    <option value="4" {{ $jenis->kategori == '4' ? 'selected' : '' }}>Kategori 4</option>
                </select>
            </div>

            <div class="flex justify-between mt-4">
            <a href="{{ route('jenis.index') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg">Back to List</a>
            
        </div>
        </form>
    </div>
</x-app-layout>
