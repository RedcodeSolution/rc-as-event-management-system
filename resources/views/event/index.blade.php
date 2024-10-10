<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <a class="text-black px-4 py-2 rounded">
                Event Section
            </a>
            <a href="{{ route('event.create') }}">
                <button type="button"
                        class="dark:bg-black text-black px-4 py-2 rounded-md bg-indigo-600 text-white text-sm font-semibold shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Add new Event
                </button>
            </a>
        </div>
    </x-slot>

    <div>
        @foreach ($events as $event) <!-- Updated variable name -->
            <a href="/events/{{ $event->id }}" class="block px-4 py-6 border border-gray-200 rounded-lg">
                <div>
                    <strong>{{ $event->event_name }}:</strong>
                    Located at {{ $event->location }} on {{ $event->start_date }}.
                </div>

                <div>
                    <strong>Description:</strong> {{ $event->description }}
                </div>

                <div>
                    <strong>Start Time:</strong> {{ $event->start_time }}
                </div>

                <div>
                    <strong>End Date:</strong> {{ $event->end_date }}
                </div>

                <div>
                    <strong>Event Status:</strong> {{ $event->is_active ? 'Active' : 'Inactive' }}
                </div>
            </a>
        @endforeach

        <div>
            {{ $events->links() }} <!-- Correctly calls links() on the paginated collection -->
        </div>
    </div>
</x-app-layout>
