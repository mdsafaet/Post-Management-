<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Admin Dashboard') }}
            </h2>
            <a href="{{ route('admin.create') }}" class="bg-blue-500 text-black px-4 py-2 rounded hover:bg-blue-600">
                Create Post
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Display success message -->
            @if(session('success'))
                <div class="mb-4 p-4 bg-green-200 text-green-800 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                    <tr>
                        <th class="px-6 py-3 text-left font-medium text-gray-500">#</th>
                        <th class="px-6 py-3 text-left font-medium text-gray-500">Title</th>
                        <th class="px-6 py-3 text-left font-medium text-gray-500">Content</th>
                        <th class="px-6 py-3 text-left font-medium text-gray-500">Published At</th>
                        <th class="px-6 py-3 text-left font-medium text-gray-500">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($posts as $post)
                        <tr>
                            <td class="px-4 py-2">{{ $post->id }}</td>
                            <td class="px-4 py-2">{{ $post->title }}</td>
                            <td class="px-4 py-2">{{ Str::limit($post->content, 10) }}</td>
                            <td class="px-4 py-2">{{ $post->published_at }}</td>
                            <td class="px-4 py-2 space-x-2">
                                <a href="{{ route('admin.edit', $post->id) }}" class="bg-blue-500 text-black px-4 py-1 rounded hover:bg-blue-600">
                                    Edit
                                </a>
                                <a href="{{ route('admin.destroy', $post->id) }}" class="bg-blue-500 text-black  px-4 py-1 rounded hover:bg-blue-600">
                                    Delete
                                </a>
                                
                               
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-4">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
