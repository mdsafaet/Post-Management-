<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>

                <!-- Display Posts as Cards with 3 Columns, Border, and "Read Post" Button -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
                    @foreach($posts as $post)
                        <div class="border border-gray-300 rounded-lg overflow-hidden shadow-lg p-6">
                            <!-- Post Title -->
                            <div class="font-bold text-xl mb-2">{{ $post->title }}</div>

                            <!-- Post Content (Preview) -->
                            <p class="text-gray-700 text-base mb-4">
                                {{ \Str::limit($post->content, 100) }} <!-- Show content preview -->
                            </p>

                            <!-- Post Date -->
                            <p class="text-gray-500 text-sm mb-4">
                                {{ $post->published_at ? \Carbon\Carbon::parse($post->published_at)->format('F j, Y') : 'No date' }}
                            </p>

                            <!-- Read Post Button -->
                            <a href="{{ route('post.show', $post->id) }}" class="inline-block bg-blue-500 text-black font-semibold px-4 py-2 rounded-md hover:bg-blue-600 transition duration-200">
                                Read Post
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

