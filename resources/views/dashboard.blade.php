<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 text-center dark:text-gray-200 leading-tight">
            {{ __('Welcome to Mindshare!') }}
        </h2>
    </x-slot>

    <div class="container mx-auto py-12 space-y-10 flex flex-col items-center text-center">
        <div class="block max-w-3xl p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <h3 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ __('Welcome to MindShare') }}</h3>
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



    </div>

</x-app-layout>
