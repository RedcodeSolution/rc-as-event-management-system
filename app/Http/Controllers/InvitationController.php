<?php

namespace App\Http\Controllers;

use App\Mail\EventNotificationMail;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Invitation;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class InvitationController extends Controller
{
    public function index()
    {
        $invitations = Invitation::with('event')->paginate(3); 
        return view('invitations.index', compact('invitations'));
    }

    public function create()
    {
        $users = User::all(); 
        $events = Event::all();

        return view('invitations.create', compact('users', 'events'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'event_id' => 'required|exists:events,id', 
            'user_id' => 'required|exists:users,id',   
        ]);

        $event = Event::find($request->input('event_id'));
    
        $invite = Invitation::create([
            'event_id' => $request->input('event_id'),
            'user_id' => $request->input('user_id'),
            'rsvp_status' => 'pending', 
        ]);

       Mail::to($invite->user->email)->send(
       new EventNotificationMail($event, $invite)
);
        return redirect()->back()->with('success', 'Invitation sent successfully!');
    }


    public function rsvpLists()
    {
        $pendingInvitations = Invitation::where('rsvp_status', 'pending')->with('event')->get();
        $acceptedInvitations = Invitation::where('rsvp_status', 'accepted')->with('event')->get();
        $declinedInvitations = Invitation::where('rsvp_status', 'declined')->with('event')->get();

        return view('invitations.rsvp', compact('pendingInvitations', 'acceptedInvitations', 'declinedInvitations'));
    } 
}
