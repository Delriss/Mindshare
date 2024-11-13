@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <div class="grow">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Blog Snippets') }}
                </h2>
            </div>

            <div class="m-1">
                <button class="bg-blue-500 text-white px-4 py-2 rounded" x-data
                    @click="$dispatch('open-modal', 'create-post-modal')">Create</button>
            </div>

            <form method="GET" action="{{ route('blog.search') }}" class="max-w-xl flex items-center">
                <input type="search" name="query" id="search-dropdown"
                    class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-l-lg border-r-0 border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500"
                    placeholder="Search Blog Titles or Tags..." />
                <button type="submit"
                    class="p-2.5 text-sm font-medium text-white bg-blue-700 rounded-r-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="w-4 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                    <span class="sr-only">Search</span>
                </button>
            </form>
        </div>
    </x-slot>

    <!-- Display Blog Posts -->
    <div class="container mx-auto mt-5 p-3">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 ">
            @foreach ($blogPosts as $blogPost)
                <x-blog-post :blogPost="$blogPost" />
            @endforeach
        </div>
        <div class="container mx-auto p-3">
            {{ $blogPosts->links() }}
        </div>

    </div>

</x-app-layout>

<!------------------------------------------------------------------------------->
<!--MODAL SECTION -->

<!-- Create Modal -->
<x-modal name="create-post-modal" focusable>
    <form method="POST" action="{{ route('blog.store') }}"
        class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow-lg mx-auto max-w-lg">
        @csrf
        <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4 text-center">Create New Blog Post</h2>
        <input type="text" name="title" placeholder="Title"
            class="w-full mt-2 p-3 border rounded-lg focus:ring focus:ring-blue-200" required>
        <!-- Tag Selection Dropdown -->
        <div class="mt-4">
            <label for="tags" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tags</label>
            @foreach ($tags as $tag)
                <div class="flex items-center">
                    <input id="tag-{{ $tag->id }}" type="checkbox" name="tags[]" value="{{ $tag->id }}"
                        class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                    <label for="tag-{{ $tag->id }}" class="ml-2 block text-sm text-gray-900 dark:text-gray-300">
                        {{ $tag->title }}
                    </label>
                </div>
            @endforeach
        </div>
        <textarea name="content" placeholder="Content" class="w-full mt-2 p-3 border rounded-lg focus:ring focus:ring-blue-200"
            required></textarea>
        <div class="mt-6 flex justify-center">
            <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600">Create</button>
            <button type="button" x-on:click="$dispatch('close-modal', 'create-post-modal')"
                class="ml-4 text-gray-500 hover:text-gray-700">Cancel</button>
        </div>
    </form>
</x-modal>
