<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <a class="text-black px-4 py-2 rounded">
                Event
            </a>
            <a href="{{ route('events.edit', $event->id) }}">
                <button type="button"
                        class="dark:bg-black text-black px-4 py-2 rounded-md bg-indigo-600 text-white text-sm font-semibold shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Change/Add Event
                </button>
            </a>
        </div>
    </x-slot>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4 w-full min-h-screen">

        <!-- Event Details -->
        <div class="grid grid-cols-2 gap-4 mb-8">
            <div>
                <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-300">Event Name:</h2>
                <p class="text-gray-600 dark:text-gray-400">{{ $event->event_name }}</p>
            </div>
            <div>
                <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-300">Location:</h2>
                <p class="text-gray-600 dark:text-gray-400">{{ $event->location }}</p>
            </div>
            <div>
                <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-300">Start Date:</h2>
                <p class="text-gray-600 dark:text-gray-400">{{ $event->start_date }}</p>
            </div>
            <div>
                <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-300">End Date:</h2>
                <p class="text-gray-600 dark:text-gray-400">{{ $event->end_date }}</p>
            </div>
            <div>
                <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-300">Start Time:</h2>
                <p class="text-gray-600 dark:text-gray-400">{{ $event->start_time }}</p>
            </div>
        </div>

        <!-- Event Status -->
        <div class="mb-8">
            <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-300">Event Status:</h2>
            <span class="inline-block px-4 py-2 mt-2 text-sm font-medium {{ $event->is_active ? 'bg-green-500 text-white' : 'bg-yellow-500 text-white' }} rounded-full">
                {{ $event->is_active ? 'Active' : 'Inactive' }}
            </span>
        </div>

    </div>

    <!-- Right Column: Event Description -->
    <div class="bg-white shadow-md rounded-lg overflow-hidden h-full">
        <div class="w-full md:w-1/3 bg-white dark:bg-gray-800 shadow-lg rounded-lg p-6 h-full">

            <!-- Event Description -->
            <div class="mb-8">
                <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-300">Description:</h2>
                <p class="text-gray-600 dark:text-gray-400">{{ $event->description }}</p>
            </div>

            <!-- Event Organizer Info -->
            <div class="mt-8">
                <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-300">Organizer Info:</h2>
                <div class="mt-4 space-y-2">
                    <p class="text-gray-700 dark:text-gray-400"><span class="font-semibold">Organizer:</span> {{ $event->organizer_name }}</p>
                    <p class="text-gray-700 dark:text-gray-400"><span class="font-semibold">Email:</span> {{ $event->organizer_email }}</p>
                    <p class="text-gray-700 dark:text-gray-400"><span class="font-semibold">Phone:</span> {{ $event->organizer_phone }}</p>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
