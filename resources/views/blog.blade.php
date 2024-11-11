<x-app-layout>
    <x-slot name="header">
        <div class="grow">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __($blogPost->title) }}
            </h2>
        </div>
    </x-slot>

    <div class="grid grid-cols-3 gap-4 m-4">
        <!-- Main Blog Content Section -->
        <div class="col-span-2 bg-white dark:bg-gray-800 dark:text-white shadow-md rounded-lg p-4">
            <h1 class="text-2xl font-bold mb-4">{{ $blogPost->title }}</h1>
            <p>{{ $blogPost->content }}</p>
        </div>

        <!-- Sidebar Section for Author Info and Meta Data -->
        <div class="container">
            <!-- Author Information and Profile Picture -->
            <div class="bg-white dark:bg-gray-800 dark:text-white shadow-md rounded-lg p-4 mb-4">
                <h2 class="text-xl font-semibold">Author</h2>
                <div class="flex items-center mt-2">
                    <div class="w-12 h-12 bg-gray-300 dark:bg-gray-600 rounded-full"></div>
                    <!-- Profile picture placeholder -->
                    <div class="ml-3">
                        <p class="font-bold">{{ $blogPost->user->name }}</p>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Bio or short description...</p>
                    </div>
                </div>
            </div>

            <!-- Meta Information Section -->
            <div class="bg-white dark:bg-gray-800 dark:text-white shadow-md rounded-lg p-4">
                <div class="flex flex-wrap">
                    @foreach ($blogPost->tags as $tag)
                        <x-blog-tag tag="{{ __($tag->title) }}" />
                    @endforeach
                </div>
                <hr class="w-full border-gray-200 dark:border-gray-700 my-4" />
                <p><strong>Created:</strong> <span
                        class="text-gray-600 dark:text-gray-400">{{ $blogPost->created_at }}</span></p>
                <p><strong>Updated:</strong> <span
                        class="text-gray-600 dark:text-gray-400">{{ $blogPost->updated_at }}</span></p>
            </div>
        </div>
    </div>


</x-app-layout>
