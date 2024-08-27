<x-app-layout>
    <x-slot name="header">
        {{ __('About us') }}
    </x-slot>

    <div class="p-4 bg-white rounded-lg shadow-xs">
        <div class="flex items-center mb-6">
            <img src="{{ asset('images/IMG_0648.jpg') }}" alt="Chelvin Oktavio" class="w-24 h-24 rounded-full border-2 border-gray-300 mr-4">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">
                    <a href="https://www.linkedin.com/in/chelvin-oktavio-75b38a272/" target="_blank" class="hover:underline">
                        Chelvin Oktavio
                    </a>
                </h2>
                <p class="text-gray-600">Student at Universitas Islam Kalimantan Muhammad Arsyad Al Banjari</p>
            </div>
        </div>

        <div class="text-gray-800">
            <p class="mb-4">I am a student at Universitas Islam Kalimantan Muhammad Arsyad Al Banjari, currently pursuing my Bachelor’s degree majoring in Information Technology. I used to go to a vocational high school where I majored in Software Engineering. This experience helps me develop my skills in college where I learn a more advanced level of programming. This includes my knowledge of Java, web development, and SQL. My knowledge of SQL helps me with my work in machine learning for the purpose of extracting and transforming data from relational databases for training and validation. Currently, I am learning how to build web applications with Laravel. I am excited to learn more about web development and how it can help me to be a developer.</p>

            <p class="mb-4">
                <strong>Languages:</strong><br>
                Bahasa Inggris - Professional working proficiency<br>
                Indonesia - Native or bilingual proficiency
            </p>
        </div>
        
        <!-- Logos with links -->
        <div class="flex space-x-4 mt-6">
            <a href="https://rateyourmusic.com/~mashpeek" target="_blank" class="inline-flex items-center">
                <img src="{{ asset('images/rym.png') }}" alt="Rate Your Music" class="w-8 h-8">
            </a>
            <a href="https://letterboxd.com/mashpeek/" target="_blank" class="inline-flex items-center">
                <img src="{{ asset('images/Letterboxd_2023_logo.png') }}" alt="Letterboxd" class="w-8 h-8">
            </a>
        </div>
    </div>
</x-app-layout>
