<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Create New Post') }}
            </h2>
            <a href="{{ route('admin.dashboard') }}" class="bg-blue-500 text-black px-4 py-2 rounded hover:bg-blue-600">
                Back to Posts
            </a>
        </div>
    </x-slot>

    <div class="container mx-auto mt-6">
        <div class="max-w-2xl mx-auto bg-white p-6 rounded shadow-lg">
            <h3 class="text-xl font-bold mb-4">Create New Post</h3>

            <form action="{{ route('admin.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="title" class="block text-sm font-semibold text-gray-700">Title</label>
                    <input type="text" name="title" id="title" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required value="{{ old('title') }}">
                    @error('title')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="content" class="block text-sm font-semibold text-gray-700">Content</label>
                    <textarea name="content" id="content" rows="5" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>{{ old('content') }}</textarea>
                    @error('content')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="published_at" class="block text-sm font-semibold text-gray-700">Published At </label>
                    <input type="datetime-local" name="published_at" id="published_at" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" value="{{ old('published_at') }}">
                    @error('published_at')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="w-full bg-white text-blue-600 font-semibold px-4 py-2 rounded-md border-2 border-blue-500 hover:bg-blue-500 hover:text-white transition duration-200">
                    Save Post
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
