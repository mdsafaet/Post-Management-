<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Post Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Post Title -->
                    <h3 class="font-bold text-3xl mb-4">{{ $post->title }}</h3>

                    <!-- Post Content -->
                    <p class="text-gray-700 text-base mb-4">
                        {{ $post->content }}
                    </p>

                    <!-- Post Published Date -->
                    <p class="text-gray-500 text-sm">
                        Published on: {{ $post->published_at ? \Carbon\Carbon::parse($post->published_at)->format('F j, Y') : 'No date' }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
