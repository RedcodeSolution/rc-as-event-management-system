<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <a class="text-black px-4 py-2 rounded">
              Send Event Invitation
            </a>
        </div>
    </x-slot>

    <div class="max-w-2xl mx-auto mt-10 bg-white shadow-md rounded-lg p-6">
    <div class="container">
    
    <form action="" method="POST">
        @csrf

        <div class="form-group">
            <label for="event_id">Select Event:</label>
            <select name="event_id" id="event_id" class="form-control" required>
                @foreach($events as $event)
                    <option value="{{ $event->id }}">{{ $event->name }} ({{ $event->date }})</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="user_id">Select User:</label>
            <select name="user_id" id="user_id" class="form-control" required>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Send Invitation</button>
    </form>
</div>
    </div>
</x-app-layout>
