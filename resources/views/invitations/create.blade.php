<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <a class="text-black px-4 font-semibold text-2xl py-2 rounded">
                Send the Mail to friends
            </a>
        </div>
    </x-slot>

    <div class="max-w-2xl mx-auto mt-10 bg-white shadow-md rounded-lg p-6">
        <form action="{{ route('invitations.store') }}" method="POST">
            @csrf

            <!-- Event Selection -->
            <div class="form-group mb-5">
                <label for="event_id">Event name:</label>
                <select name="event_id" id="event_id" required class="mt-1 block w-full p-2 border border-gray-300 rounded">
                    <option value="">Select event name</option>
                    @foreach($events as $event)
                        <option value="{{ $event->id }}">{{ $event->title }}</option>
                    @endforeach
                </select>
            </div>

            <!-- User Selection -->
            <div class="form-group mb-5">
                <label for="user_id">User:</label>
                <select name="user_id" id="user_id" required class="mt-1 block w-full p-2 border border-gray-300 rounded">
                    <option value="">Select a user</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->email }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Send Invitation</button>
        </form>
    </div>
</x-app-layout>
