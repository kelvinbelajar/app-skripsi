<x-app-layout>
    <x-slot name="header">
        {{ __('Acara Details') }}
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
  
        <div class="flex justify-end mb-4 gap-2">
            <a href="{{ route('printAllAcaraDetail') }}" target="_blank"
          class="flex items-center px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-green ml-2">
          <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
            width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
            <path fill-rule="evenodd"
              d="M8 3a2 2 0 0 0-2 2v3h12V5a2 2 0 0 0-2-2H8Zm-3 7a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h1v-4a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v4h1a2 2 0 0 0 2-2v-5a2 2 0 0 0-2-2H5Zm4 11a1 1 0 0 1-1-1v-4h8v4a1 1 0 0 1-1 1H9Z"
              clip-rule="evenodd" />
          </svg>
          Cetak Data Event Acara
        </a>
            <a href="{{ route('acara_details.create') }}"
                class="flex items-center px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue">
                <svg class="w-6 h-6 text-gray-800 dark:text-white mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M14 8H4m8 3.5v5M9.5 14h5M4 6v13a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V9a1 1 0 0 0-1-1h-5.032a1 1 0 0 1-.768-.36l-1.9-2.28a1 1 0 0 0-.768-.36H5a1 1 0 0 0-1 1Z" />
                </svg>
                Tambah Data Acara Detail
            </a>
        </div>
  
        <div class="overflow-hidden mb-8 w-full rounded-lg border shadow-xs">
            <div class="overflow-x-auto w-full">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr class="text-xs font-semibold tracking-wide text-center text-gray-500 uppercase bg-gray-50 border-b">
                            <th class="px-4 py-3 text-center">No</th>
                            <th class="px-4 py-3 text-center">Organisasi</th>
                            <th class="px-4 py-3 text-center">Acara</th>
                            <th class="px-4 py-3 text-center">Kategori</th>
                            <th class="px-4 py-3 text-center">Tanggal_Mulai</th>
                            <th class="px-4 py-3 text-center">Tanggal_Akhir</th>
                            <th class="px-4 py-3 text-center">Alamat</th>
                            <th class="px-4 py-3 text-center">Action</th>
                        </tr>
                    </thead>
                    
                    <tbody class="bg-white divide-y">
                        @forelse ($acaraDetails as $acaraDetail)
                            <tr class="text-gray-700">
                                <td class="px-4 py-3 text-sm"> <!-- iteration for listing -->
                                    {{ $loop->iteration}}
                                </td>
                                <td class="px-4 py-3 text-sm text-center">
                                    {{ $acaraDetail->eventOrganizer->nama_organisasi }} <!-- Assuming 'name' is a field in Acara -->
                                </td>
                                <td class="px-4 py-3 text-sm text-center">
                                    {{ $acaraDetail->acara->nama_acara }} <!-- Assuming 'name' is a field in Jenis -->
                                </td>
                                <td class="px-4 py-3 text-sm text-center">
                                    {{ $acaraDetail->acara->kategori }} <!-- Assuming 'time' is a field in Jadwal -->
                                </td>
                                <td class="px-4 py-3 text-sm text-center">
                                    {{ $acaraDetail->jadwal->tanggal_mulai }} <!-- Assuming 'address' is a field in Lokasi -->
                                </td>
                                <td class="px-4 py-3 text-sm text-center">
                                    {{ $acaraDetail->jadwal->tanggal_akhir }} <!-- Assuming 'address' is a field in Lokasi -->
                                </td>
                                
                                <td class="px-4 py-3 text-sm text-center">
                                    {{ $acaraDetail->lokasi->address }} <!-- Assuming 'address' is a field in Lokasi -->
                                <td class="px-4 py-3 text-sm flex space-x-2">
                                    <a href="{{ route('acara_details.show', $acaraDetail->id) }}"
                                        class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                        <!-- Map Pin Icon -->
                                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                             xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                             viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-width="2" d="M12 2C8.69 2 6 4.69 6 8c0 4.4 6 12 6 12s6-7.6 6-12c0-3.31-2.69-6-6-6zm0 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4z" />
                                        </svg>
                                     </a>

                                     <a href="{{ route('printAcaraDetailbyID', $acaraDetail->id) }}" target="_blank"
                                        class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-green">
                                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                          xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                          viewBox="0 0 24 24">
                                          <path fill-rule="evenodd"
                                            d="M8 3a2 2 0 0 0-2 2v3h12V5a2 2 0 0 0-2-2H8Zm-3 7a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h1v-4a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v4h1a2 2 0 0 0 2-2v-5a2 2 0 0 0-2-2H5Zm4 11a1 1 0 0 1-1-1v-4h8v4a1 1 0 0 1-1 1H9Z"
                                            clip-rule="evenodd" />
                                        </svg>
                                      </a>
                                     
                                    <a href="{{ route('acara_details.edit', $acaraDetail->id) }}"
                                        class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-yellow-400 border border-transparent rounded-lg active:bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:shadow-outline-yellow">
                                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
                                        </svg>
                                    </a>
  
                                    <form action="{{ route('acara_details.destroy', $acaraDetail->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red">
                                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                            </svg>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-4 py-3 text-sm text-center text-gray-500">No records found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
  </x-app-layout>

  <!-- Add this script block to hide the alert after 3 seconds -->
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
