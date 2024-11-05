<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Blog Snippets') }}
        </h2>
    </x-slot>

    <table class="table-auto border-collapse w-full text-left">
        <thead>
            <tr>
                <th class="border px-4 py-2">Title</th>
                <th class="border px-4 py-2">Excerpt</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($blogPosts as $blogPost)
            <tr>
                <td class="border px-4 py-2">
                    <a href="{{ route('blog.show', $blogPost) }}">{{ $blogPost->title }}</a>
                </td>
                <td class="border px-4 py-2">{{ $blogPost->excerpt }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

</x-app-layout>
