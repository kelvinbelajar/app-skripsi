<x-app-layout>
    <x-slot name="header">
        {{ __('Daftar Lokasi') }}
    </x-slot>

    <div class="p-4 bg-white rounded-lg shadow-xs">

        <!-- Alert section -->
        @if (session('success'))
            <div id="alert-success" class="inline-flex overflow-hidden mb-4 w-full bg-white rounded-lg shadow-md">
                <div class="flex justify-center items-center w-12 bg-blue-500">
                    <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM21.6667 28.3333H18.3334V25H21.6667V28.3333ZM21.6667 21.6666H18.3334V11.6666H21.6667V21.6666Z">
                        </path>
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
                        <path
                            d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM21.6667 28.3333H18.3334V25H21.6667V28.3333ZM21.6667 21.6666H18.3334V11.6666H21.6667V21.6666Z">
                        </path>
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

        <div class="flex justify-end mb-4">
            <a href="{{ route('printAllLokasi') }}" target="_blank"
                class="flex items-center px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-green ml-2">
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd"
                        d="M8 3a2 2 0 0 0-2 2v3h12V5a2 2 0 0 0-2-2H8Zm-3 7a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h1v-4a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v4h1a2 2 0 0 0 2-2v-5a2 2 0 0 0-2-2H5Zm4 11a1 1 0 0 1-1-1v-4h8v4a1 1 0 0 1-1 1H9Z"
                        clip-rule="evenodd" />
                </svg>
                Cetak Data Lokasi
            </a>
            <a href="{{ route('lokasis.create') }}"
                class="flex items-center px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue">
                <svg class="w-6 h-6 text-gray-800 dark:text-white mr-2" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M14 8H4m8 3.5v5M9.5 14h5M4 6v13a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V9a1 1 0 0 0-1-1h-5.032a1 1 0 0 1-.768-.36l-1.9-2.28a1 1 0 0 0-.768-.36H5a1 1 0 0 0-1 1Z" />
                </svg>
                Tambah Lokasi
            </a>
        </div>

        <div class="overflow-hidden mb-8 w-full rounded-lg border shadow-xs">
            <div class="overflow-x-auto w-full">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase bg-gray-50 border-b">
                            <th class="px-4 py-3">No</th>
                            <th class="px-4 py-3">Acara</th>
                            <th class="px-4 py-3">Alamat</th>
                            <th class="px-4 py-3">Provinsi</th>
                            <th class="px-4 py-3">Kabupaten</th>
                            <th class="px-4 py-3">Kecamatan</th>
                            <th class="px-4 py-3">Desa</th>

                            <th class="px-4 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y">
                        @forelse ($lokasi as $item)
                            <tr class="text-gray-700">
                                <td class="px-4 py-3 text-sm"> <!-- iteration for listing -->
                                    {{ $loop->iteration }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ optional($item->acaras)->nama_acara }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $item->address }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $item->province->name }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $item->regency->name }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $item->district->name }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $item->village->name }}
                                </td>

                                <td class="px-4 py-3 text-sm flex space-x-2">
                                    <a href="{{ route('lokasis.show', $item->id) }}"
                                        class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-width="2"
                                                d="M20 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z" />
                                            <path stroke="currentColor" stroke-width="2"
                                                d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                        </svg>
                                    </a>

                                    <a href="{{ route('printLokasibyID', $item->id) }}" target="_blank"
                                        class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-green">
                                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                          xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                          viewBox="0 0 24 24">
                                          <path fill-rule="evenodd"
                                            d="M8 3a2 2 0 0 0-2 2v3h12V5a2 2 0 0 0-2-2H8Zm-3 7a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h1v-4a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v4h1a2 2 0 0 0 2-2v-5a2 2 0 0 0-2-2H5Zm4 11a1 1 0 0 1-1-1v-4h8v4a1 1 0 0 1-1 1H9Z"
                                            clip-rule="evenodd" />
                                        </svg>
                                      </a>

                                    <a href="{{ route('lokasis.edit', $item->id) }}"
                                        class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-yellow-400 border border-transparent rounded-lg active:bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:shadow-outline-yellow">
                                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="m11.25 5.332-6.306 9.743c-.59.911-.885 1.366-.874 1.793.01.386.2.754.51.988.364.28.927.28 2.054.28H17.366c.931 0 1.396 0 1.745-.138a2 2 0 0 0 1.116-1.117c.137-.348.137-.813.137-1.744v-.634c0-.931 0-1.396-.137-1.744a2 2 0 0 0-1.116-1.116c-.348-.137-.813-.137-1.745-.137h-3.384m-3.884-3.384 1.98-1.98c.509-.509.764-.764.981-.858a1 1 0 0 1 .768 0c.217.094.472.35.981.858l.848.848c.51.51.764.765.858.982a1 1 0 0 1 0 .768c-.094.217-.35.472-.858.981l-1.98 1.98c-.393.394-.589.59-.816.667a1 1 0 0 1-.633 0c-.227-.077-.423-.273-.816-.667l-.848-.848c-.51-.51-.765-.764-.858-.981a1 1 0 0 1 0-.768c.093-.217.348-.472.857-.981Z" />
                                        </svg>
                                    </a>

                                    <form action="{{ route('lokasis.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red"
                                            onclick="return confirm('Are you sure you want to delete this item?');">
                                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M7.5 8v11m9-11v11m-11-9h13c.465 0 .697 0 .882-.102a1 1 0 0 0 .438-.57c.08-.23.02-.462-.1-.924l-1.125-4.5c-.108-.432-.162-.648-.288-.805a1 1 0 0 0-.466-.332C18.477 3 18.257 3 17.818 3H6.182c-.439 0-.658 0-.813.065a1 1 0 0 0-.466.332c-.126.157-.18.373-.288.805L3.49 8.098c-.12.462-.18.694-.1.924a1 1 0 0 0 .438.57c.185.102.417.102.882.102h13ZM10 11v8c0 .931 0 1.396.138 1.745a2 2 0 0 0 1.116 1.116C11.603 22 12.069 22 13 22s1.396 0 1.744-.138a2 2 0 0 0 1.116-1.116C16 20.396 16 19.931 16 19v-8" />
                                            </svg>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr class="text-gray-700">
                                <td colspan="9" class="px-4 py-3 text-sm text-center">
                                    Belum ada lokasi yang ditambahkan.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        setTimeout(function() {
            var alertSuccess = document.getElementById('alert-success');
            var alertError = document.getElementById('alert-error');
            if (alertSuccess) {
                alertSuccess.style.display = 'none';
            }
            if (alertError) {
                alertError.style.display = 'none';
            }
        }, 3000);
    });
</script>
