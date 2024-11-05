<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Blog Snippets') }}
        </h2>
    </x-slot>

    <div class="container mx-auto mt-5 p-3">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 ">
            @foreach ($blogPosts as $blogPost)
            <div class="bg-white dark:bg-gray-800 dark:text-white shadow-md rounded-lg p-4 flex flex-col h-full">
                <div class="flex-grow">
                    <h2 class="text-lg font-bold mb-2">{{ $blogPost->title }}</h2>
                    <hr class="w-full border-gray-200 dark:border-gray-700 my-4" />
                    <p class="text-gray-700 dark:text-gray-400 mb-4">{{ $blogPost->excerpt }}</p>
                </div>
                <hr class="w-full border-gray-200 dark:border-gray-700 my-4" />
                <div class="justify-self-end">
                    <a href="{{ route('blog.show', $blogPost) }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Read more
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</x-app-layout>
