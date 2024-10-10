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
            'user_id' => 'required|exists:users,id',
            'title' => 'required|string|max:255',
            'event_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'start_time' => 'nullable|date_format:H:i',
            'location' => 'required|string|max:255',
        ]);

        // Check if required inputs exist and are not empty
        $inputValues = [

            'user_id' => $request->input('user_id'),
            'title' => $request->input('title'),
            'event_name' => $request->input('event_name'),
            'description' => $request->input('description'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'start_time' => $request->input('start_time'),
            'location' => $request->input('location'),
        ];

        foreach ($inputValues as $key => $value) {
            if (is_null($value) || $value === '') {
                return response()->json(["error" => "$key is required."], 400);
            }
        }

        // Create new event
        $event = new Event();

        $event->user_id = $inputValues['user_id'];
        $event->title = $inputValues['title'];
        $event->event_name = $inputValues['event_name'];
        $event->description = $inputValues['description'];
        $event->start_date = $inputValues['start_date'];
        $event->end_date = $inputValues['end_date'];
        $event->start_time = $inputValues['start_time'];
        $event->location = $inputValues['location'];

        // Save event
        if ($event->save()) {
           return redirect()->route('event')->with('message', 'Event added successfully!');
        } else {
            return response()->json(["error" => "Failed to create event."], 500);
        }


    }



        public function index()
           {

               $events = Event::Paginate(3);

               return view('event.index', compact('events'));
           }

           public function show($id)
             {
         $events = Event::find($id);
         //        dd($pet);

                 return view('event.show', ['event' => $events]);
             }


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
