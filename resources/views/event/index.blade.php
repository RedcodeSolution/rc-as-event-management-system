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






</x-app-layout>
