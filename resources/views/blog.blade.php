<x-app-layout>
    <x-slot name="header">
        <div class="grow">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __($blogPost->title) }}
            </h2>
            
        </div>
    </x-slot>

</x-app-layout>