<x-app-layout>
    <x-slot name="header">
        <img src="{{ asset('images/brain.png') }}" class="mx-auto hover:scale-105 transition-transform duration-200 w-250 h-250">
        <h2 class="mb-4 text-4xl font-bold tracking-tight leading-none md:text-5xl lg:text-6xl dark:text-white hover:scale-105 transition-transform duration-200 max-w-fit mx-auto">
            {{ __('Welcome to Mindshare!') }}
        </h2>
        <p class="mt-8 text-pretty text-lg font-medium text-gray-500 sm:text-xl/8 text-center">Your hub for knowledge and inspiration.</p>
        <div class="mt-10 flex items-center justify-center gap-x-6">
            <a href="{{ route('register') }}" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-lg font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Get started</a>
            <a href="#" class="text-lg font-semibold text-gray-900 dark:text-white">Learn more <span aria-hidden="true">→</span></a>
        </div>
    </x-slot>

    <div class="container mx-auto py-12 space-y-10 flex flex-col items-center text-center">
        <div class="block max-w-3xl p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <h3 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ __('Welcome to Mindshare') }}</h3>
            <p class="font-normal text-gray-700 dark:text-gray-400">{{ __('Your hub for knowledge and inspiration.') }}</p>

            <p class="font-normal text-gray-700 dark:text-gray-400">{{ __('We\'re a community-driven blog where individuals from all walks of life come together to share their unique perspectives and insights. Whether you\'re an expert in your field or simply passionate about a particular topic, you\'ll find a welcoming space to contribute your voice.') }}</p>
        </div>

        <div class="block max-w-3xl p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <h3 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ __('Explore a Diverse Range of Subjects') }}</h3>
            <p class="font-normal text-gray-700 dark:text-gray-400">{{ __('From technology and science to art and culture. Discover thought-provoking articles, engaging discussions, and creative projects that spark curiosity and challenge your thinking.') }}</p>
        </div>

        <div class="block max-w-3xl p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <h3 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ __('Join the MindShare Community') }}</h3>
            <p class="font-normal text-gray-700 dark:text-gray-400">{{ __('Join us in shaping the future of knowledge sharing. Become a part of the MindShare community today!') }}</p>
        </div>
    </div>
</x-app-layout>