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
            'is_active' => 'required|boolean',
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
            'is_active' => $request->input('is_active'),
        ];

        foreach ($inputValues as $key => $value) {
            if (is_null($value) || $value === '') {
                return response()->json(["error" => "$key is required."], 400);
            }
        }

        // Create new event
        $event = new Event();
        $event->user_id = $request->input('user_id');
        $event->event_name = $request->input('event_name');
        $event->description = $request->input('description');
        $event->start_date = $request->input('start_date');
        $event->end_date = $request->input('end_date');
        $event->start_time = $request->input('start_time');
        $event->location = $request->input('location');
        $event->is_active = $request->input('is_active');

        $event->save();



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
               $event = Event::findOrFail($id);
               return view('event.show', compact('event'));
           }


       public function edit($id)
          {
              $events = Event::find($id);
              return view('event.edit', ['event' => $events]);
          }

      public function update(Request $request, $id)
      {
          // Validate the incoming request data
          $request->validate([
              'event_name' => 'required|string|max:255',
              'location' => 'required|string|max:255',
              'start_date' => 'required|date',
              'end_date' => 'required|date|after_or_equal:start_date',
              'start_time' => 'required|date_format:H:i',
              'description' => 'nullable|string',
              'is_active' => 'required|boolean',

          ]);


        $event = Event::findOrFail($id);

          if (!$event) {
              return redirect()->route('event.index')->with('error', 'Event not found!');
          }

          // Update the event attributes
          $event->event_name = $request->input('event_name');
          $event->location = $request->input('location');
          $event->start_date = $request->input('start_date');
          $event->end_date = $request->input('end_date');
          $event->start_time = $request->input('start_time');
          $event->description = $request->input('description');
          $event->is_active = $request->input('is_active');


          // Save the updated event
          $event->save();

          return redirect()->route('event.show', $event->id)->with('message', 'Event updated successfully!');
      }


       public function destroy($id)
           {
               $event = Event::findOrFail($id);
              $delete = $event->delete();

               if ($delete) {
                   return redirect()->route('event')->with('message', 'Event delete successfully!');
               }else{
                   echo "not";
             }
       }
}
