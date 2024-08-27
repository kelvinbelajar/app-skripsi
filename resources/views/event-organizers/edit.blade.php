<x-app-layout>
    <x-slot name="header">
        {{ __('Edit Data Event Organizers') }}
    </x-slot>

    <div class="p-4 bg-white rounded-lg shadow-xs">
        <form action="{{ route('event-organizers.update', $eventOrganizer->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-4">
                <label for="nama_organisasi" class="block text-sm font-medium text-gray-700">Nama Organisasi</label>
                <input type="text" name="nama_organisasi" id="nama_organisasi" class="mt-1 block w-full" placeholder="Nama Organisasi" value="{{ old('nama_organisasi', $eventOrganizer->nama_organisasi) }}" required>
            </div>

            <div class="mb-4">
                <label for="kontak" class="block text-sm font-medium text-gray-700">Kontak</label>
                <input type="text" name="kontak" id="kontak" class="mt-1 block w-full" placeholder="Kontak" value="{{ old('kontak', $eventOrganizer->kontak) }}" required>
            </div>

            <div class="mb-4">
                <label for="email_organisasi" class="block text-sm font-medium text-gray-700">Email Organisasi</label>
                <input type="email" name="email_organisasi" id="email_organisasi" class="mt-1 block w-full" placeholder="Email Organisasi" value="{{ old('email_organisasi', $eventOrganizer->email_organisasi) }}" required>
            </div>

            <div class="mb-4">
                <label for="no_rekening" class="block text-sm font-medium text-gray-700">No. Rekening</label>
                <input type="text" name="no_rekening" id="no_rekening" class="mt-1 block w-full" placeholder="No. Rekening" value="{{ old('no_rekening', $eventOrganizer->no_rekening) }}" required>
            </div>

            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg">Update</button>
        </form>
    </div>
  
    {{-- Add this script to the end of the file --}}
    {{-- <script>
        function fileChosen(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    this.parpolPicturePreview = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        }
    </script> --}}
</x-app-layout>
