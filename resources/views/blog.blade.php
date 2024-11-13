<x-app-layout>

    <!-- Header Section -->
    <x-slot name="header">
        <div class="flex items-center justify-between">

            <!-- Back Button -->
            <button onclick="window.history.back()"
                class="text-gray-800 dark:text-gray-200 font-semibold text-xl py-2 px-4 rounded-md hover:bg-gray-200 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                ← Back
            </button>

            <!-- Blog Post Title -->
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __($blogPost->title) }}
            </h2>

        </div>
    </x-slot>
    <!-- End Header Section -->

    <!-- Display Blog Post -->
    <div class="container mx-auto mt-5 p-3">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 p-4">

            <!-- Sidebar Section for Author Info and Meta Data (Appears first on small screens) -->
            <div class="md:order-2 md:col-span-1 space-y-4">

                <!-- Author Information and Profile Picture -->
                <div class="bg-white dark:bg-gray-800 dark:text-white shadow-md rounded-lg p-4">
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
                    @if ($blogPost->user_id === auth()->id()) <!-- Check if the user is the author of the post -->

                        <!-- Edit button -->
                        <button class="bg-yellow-500 text-white px-4 py-2 rounded" x-data="{ id: {{ $blogPost->id }}, title: '{{ $blogPost->title }}', content: '{{ $blogPost->content }}' }"
                            @click="$dispatch('open-modal', 'edit-post-modal');
                                     document.getElementById('editTitle').value = title;
                                     document.getElementById('editContent').value = content;
                                    ">
                            Edit
                        </button>

                        <!-- Delete button -->
                        <button class="bg-red-500 text-white px-4 py-2 rounded" x-data="{ id: {{ $blogPost->id }} }"
                            @click="$dispatch('open-modal', 'delete-post-modal');">
                            Delete
                        </button>

                        <hr class="w-full border-gray-200 dark:border-gray-700 my-4" />
                    @endif

                    <!-- Tags Section -->
                    <div class="flex flex-wrap">
                        @if ($blogPost->tags->isEmpty()) <!-- Check if the post has any tags -->
                            <p class="text-gray-600 dark:text-gray-400">No tags available</p>
                        @else
                            @foreach ($blogPost->tags as $tag)
                                <x-blog-tag tag="{{ __($tag->title) }}" />
                            @endforeach
                        @endif
                    </div>

                    <hr class="w-full border-gray-200 dark:border-gray-700 my-4" /> 

                    <!-- Date/Time Information -->
                    <p><strong>Created:</strong> <span
                            class="text-gray-600 dark:text-gray-400">{{ $blogPost->created_at->diffForHumans() }}</span>
                    </p>
                    <p><strong>Updated:</strong> <span
                            class="text-gray-600 dark:text-gray-400">{{ $blogPost->updated_at->diffForHumans() }}</span>
                    </p>

                </div>
            </div>

            <!-- Main Blog Content Section -->
            <div class="md:order-1 md:col-span-2 bg-white dark:bg-gray-800 dark:text-white shadow-md rounded-lg p-4">
                <h1 class="text-2xl font-bold mb-4">{{ $blogPost->title }}</h1>
                <div class="bg-gray-300 dark:bg-gray-900 p-2 rounded-lg shadow-md space-y-4">
                    {!! nl2br(e($blogPost->content)) !!} <!-- Display the blog post content -->
                </div>
            </div>

        </div>
    </div>
</x-app-layout>


<!-- Edit Modal -->
<x-modal name="edit-post-modal" focusable>
    <form method="POST" action="{{ route('blog.update', ['slug' => $blogPost->slug]) }}" id="editForm"
        class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow-lg mx-auto max-w-lg">
        @csrf
        @method('PUT')
        <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4 text-center">Edit Blog Post</h2>
        <input type="text" name="title" id="editTitle"
            class="w-full mt-2 p-2 border rounded dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200" required>
        <textarea name="content" id="editContent"
            class="w-full mt-2 p-3 border rounded-lg focus:ring focus:ring-blue-200 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200"
            required></textarea>
        <div class="mt-4">
            <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded">Update</button>
            <button type="button" x-on:click="$dispatch('close-modal', 'edit-post-modal')"
                class="ml-2 text-gray-500 dark:text-gray-400">Cancel</button>
        </div>
    </form>
</x-modal>

<!-- Delete Modal -->
<x-modal name="delete-post-modal" focusable>
    <form method="POST" action="{{ route('blog.destroy', ['slug' => $blogPost->slug]) }}" id="deleteForm"
        class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow-lg mx-auto max-w-lg">
        @csrf
        @method('DELETE')
        <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4 text-center">Delete Blog Post</h2>
        <p class="mt-2 text-gray-600 dark:text-gray-400">Are you sure you want to delete this post? This action cannot
            be undone.</p>
        <div class="mt-4 flex justify-center">
            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Delete</button>
            <button type="button" x-on:click="$dispatch('close-modal', 'delete-post-modal')"
                class="ml-2 text-gray-500 dark:text-gray-400">Cancel</button>
        </div>
    </form>
</x-modal>
