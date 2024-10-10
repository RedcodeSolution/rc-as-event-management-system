<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Event;

class EventController extends Controller
{
     public function save(Request $request)
        {
            // Validate part pet
            $request->validate([
               'event_id' => 'required|string|max:255|unique:events,event_id',
               'user_id' => 'required|exists:users,id',
               'title' => 'required|string|max:255',
               'event_name' => 'required|string|max:255',
               'description' => 'nullable|string',
               'start_date' => 'required|date',
               'end_date' => 'required|date|after_or_equal:start_date',
               'start_time' => 'nullable|date_format:H:i',
               'location' => 'required|string|max:255',
            ]);

            // Create new pet
             $event = new Event();
             $event->event_id = $request->input('event_id');
             $event->user_id = $request->input('user_id');
             $event->title = $request->input('title');
             $event->event_name = $request->input('event_name');
             $event->description = $request->input('description');
             $event->start_date = $request->input('start_date');
             $event->end_date = $request->input('end_date');
             $event->start_time = $request->input('start_time');
             $event->location = $request->input('location');


            // Save pet
            $event->save();

            // Redirect with a success message
            return redirect()->route('events.index')->with('message', 'Event created successfully!');
        }

        public function index(Request $request) :view
            {
                $events = Event::latest()->paginate(3);
                return view('event.index', [
                    'event' => $events,
                ]);
            }

//          public function show(Request $request) :view
//             {
//                 $events = Event::latest()->paginate(3);
//                 return view('event.index', [
//                     'event' => $events,
//                 ]);
//             }




        public function edit(Request $request): View
        {

        }

        public function update(ProfileUpdateRequest $request): RedirectResponse
        {

        }

        public function destroy(Request $request): RedirectResponse
        {

        }
}
