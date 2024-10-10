<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Event Section') }}
        </h2>
    </x-slot>

    <!-- Card Container -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Card -->
            <div class="bg-white shadow-lg rounded-lg p-8">
                <!--
                  This example requires some changes to your config:

                  ```
                  // tailwind.config.js
                  module.exports = {
                    // ...
                    plugins: [
                      // ...
                      require('@tailwindcss/forms'),
                    ],
                  }
                  ```
                -->
                <form>
                    <div class="space-y-12">
                        <div class="border-b border-gray-900/10 pb-12">
                            <div class="mt-10 ml-10 grid grid-cols-1 gap-x-6 gap-y-6 sm:grid-cols-6">
                                <!-- Event ID -->
                                <div class="sm:col-span-2">
                                    <label for="event-id" class="block text-sm font-medium leading-6 text-gray-900">Event ID</label>
                                    <div class="mt-2">
                                        <input type="text" name="event-id" id="event-id" autocomplete="off" class="block w-80 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>

                                <!-- Event Name -->
                                <div class="sm:col-span-2">
                                    <label for="event-name" class="block text-sm font-medium leading-6 text-gray-900">User ID</label>
                                    <div class="mt-2">
                                        <input type="text" name="event-name" id="event-name" autocomplete="off" class="block w-80 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>

                                <!-- Event Name -->
                                <div class="sm:col-span-2">
                                    <label for="event-name" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
                                    <div class="mt-2">
                                     <input type="text" name="event-name" id="event-name" autocomplete="off" class="block w-80 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                   </div>
                                </div>

                                 <!-- Event Name -->
                                  <div class="sm:col-span-2">
                                       <label for="event-name" class="block text-sm font-medium leading-6 text-gray-900">Event Name</label>
                                           <div class="mt-2">
                                            <input type="text" name="event-name" id="event-name" autocomplete="off" class="block w-80 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                      </div>
                                   </div>

                                <!-- Description -->
                                <div class="sm:col-span-2">
                                    <label for="description" class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                                    <div class="mt-2">
                                        <input type="text" name="description" id="description" autocomplete="off" class="block w-80 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>

                                <!-- Start Date -->
                                <div class="sm:col-span-2">
                                    <label for="start-date" class="block text-sm font-medium leading-6 text-gray-900">Start Date</label>
                                    <div class="mt-2">
                                        <input type="date" name="start-date" id="start-date" autocomplete="off" class="block w-80 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>

                                <!-- End Date -->
                                <div class="sm:col-span-2">
                                    <label for="end-date" class="block text-sm font-medium leading-6 text-gray-900">End Date</label>
                                    <div class="mt-2">
                                        <input type="date" name="end-date" id="end-date" autocomplete="off" class="block w-80 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>

                                <div class="sm:col-span-3">
                                    <label for="start-time" class="block text-sm font-medium leading-6 text-gray-900">Start Time</label>
                                    <div class="mt-2">
                                        <input type="time" name="start-time" id="start-time" autocomplete="off" class="block w-80 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>

                                <!-- Email Address -->
                                <div class="sm:col-span-4">
                                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Location</label>
                                    <div class="mt-2">
                                        <input id="email" name="email" type="email" autocomplete="email" class="block w-80 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="mt-6 flex items-center justify-end gap-x-6">
                        <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
                        <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-offset-2">
                            Save
                        </button>
                        <button type="submit" class="rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-green-600 focus:ring-offset-2">
                            Update
                        </button>

                        <button type="submit" class="rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-red-600 focus:ring-offset-2">
                            Delete
                        </button>

                    </div>
                </form>
            </div>
            <!-- End of Card -->
        </div>
    </div>
    <!-- End of Card Container -->

</x-app-layout>
