<x-app-layout>
    <x-slot name="header">
        {{ __('Event Organizer Details') }}
    </x-slot>

    <div class="p-4 bg-white rounded-lg shadow-xs">
        <div class="mb-4">
            <label for="nama_organisasi" class="block text-sm font-medium text-gray-700">Nama Organisasi</label>
            <input type="text" id="nama_organisasi" class="mt-1 block w-full bg-gray-100 text-gray-700" value="{{ $eventOrganizer->nama_organisasi }}" readonly>
        </div>

        <div class="mb-4">
            <label for="kontak" class="block text-sm font-medium text-gray-700">Kontak</label>
            <input type="text" id="kontak" class="mt-1 block w-full bg-gray-100 text-gray-700" value="{{ $eventOrganizer->kontak }}" readonly>
        </div>

        <div class="mb-4">
            <label for="email_organisasi" class="block text-sm font-medium text-gray-700">Email Organisasi</label>
            <input type="email" id="email_organisasi" class="mt-1 block w-full bg-gray-100 text-gray-700" value="{{ $eventOrganizer->email_organisasi }}" readonly>
        </div>

        <div class="mb-4">
            <label for="no_rekening" class="block text-sm font-medium text-gray-700">No. Rekening</label>
            <input type="text" id="no_rekening" class="mt-1 block w-full bg-gray-100 text-gray-700" value="{{ $eventOrganizer->no_rekening }}" readonly>
        </div>

        <a href="{{ route('event-organizers.index') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg">Back to List</a>
    </div>
</x-app-layout>
