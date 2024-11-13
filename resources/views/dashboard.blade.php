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

            <form class="max-w-xl">
                <div class="flex">
                    <button id="dropdown-button" data-dropdown-toggle="dropdown"
                        class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600"
                        type="button">All Tags <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <div id="dropdown"
                        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdown-button">
                            <li>
                                <button type="button"
                                    class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Mockups</button>
                            </li>
                            <li>
                                <button type="button"
                                    class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Templates</button>
                            </li>
                            <li>
                                <button type="button"
                                    class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Design</button>
                            </li>
                            <li>
                                <button type="button"
                                    class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Logos</button>
                            </li>
                        </ul>
                    </div>
                    <div class="relative w-full">
                        <input type="search" id="search-dropdown"
                            class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-s-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500"
                            placeholder="Search Mockups, Logos, Design Templates..." required />
                        <button type="submit"
                            class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                            <span class="sr-only">Search</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </x-slot>

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
    <form method="POST" action="{{ route('blog.store') }}" class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow-lg mx-auto max-w-lg">
        @csrf
        <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4 text-center">Create New Blog Post</h2>
        <input type="text" name="title" placeholder="Title" class="w-full mt-2 p-3 border rounded-lg focus:ring focus:ring-blue-200" required>
        <textarea name="content" placeholder="Content" class="w-full mt-2 p-3 border rounded-lg focus:ring focus:ring-blue-200" required></textarea>
        <div class="mt-6 flex justify-center">
            <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600">Create</button>
            <button type="button" x-on:click="$dispatch('close-modal', 'create-post-modal')" class="ml-4 text-gray-500 hover:text-gray-700">Cancel</button>
        </div>
    </form>
</x-modal>

<!-- Edit Modal -->
<x-modal name="edit-post-modal" focusable>
    <form method="POST" action="" id="editForm">
        @csrf
        @method('PUT')
        <h2 class="text-lg font-semibold text-gray-900">Edit Blog Post</h2>
        <input type="text" name="title" id="editTitle" class="w-full mt-2 p-2 border rounded" required>
        <textarea name="content" id="editContent" class="w-full mt-2 p-2 border rounded" required></textarea>
        <div class="mt-4">
            <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded">Update</button>
            <button type="button" x-on:click="$dispatch('close-modal', 'edit-post-modal')" class="ml-2 text-gray-500">Cancel</button>
        </div>
    </form>
</x-modal>

<!-- Delete Modal -->
<x-modal name="delete-post-modal" focusable>
    <h2 class="text-lg font-semibold text-gray-900">Delete Blog Post</h2>
    <p class="mt-2">Are you sure you want to delete this post? This action cannot be undone.</p>
    <form method="POST" action="" id="deleteForm" class="mt-4">
        @csrf
        @method('DELETE')
        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Delete</button>
        <button type="button" x-on:click="$dispatch('close-modal', 'delete-post-modal')" class="ml-2 text-gray-500">Cancel</button>
    </form>
</x-modal>
