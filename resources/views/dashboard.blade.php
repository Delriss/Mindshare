<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Blog Snippets') }}
        </h2>
    </x-slot>

    <div class="container mx-auto mt-10">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @foreach ($blogPosts as $blogPost)
                <div class="bg-white shadow-md rounded-lg p-4">
                    <h2 class="text-lg font-bold mb-2">{{ $blogPost->title }}</h2>
                    <p class="text-gray-700">{{ $blogPost->excerpt }}</p>
                    <a href="{{ route('blog.show', $blogPost) }}" class="text-blue-500 hover:underline">Read More</a>
                </div>
            @endforeach
        </div>
    </div>

</x-app-layout>
