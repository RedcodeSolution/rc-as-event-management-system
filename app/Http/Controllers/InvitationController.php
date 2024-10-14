<?php

namespace App\Http\Controllers;

use App\Mail\EventNotificationMail;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Invitation;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Services\InvitationService;

class InvitationController extends Controller
{
    protected $invitationService;

    public function __construct(InvitationService $invitationService)
    {
        $this->invitationService = $invitationService;
    }

    public function index()
    {
        $invitations = $this->invitationService->getAllPaginated(3);
        return view('invitations.index', compact('invitations'));
    }

    public function create()
{
    $events = Event::all(); 
    $users = User::all();
    return view('invitations.create', compact('events','users')); 
}


    public function store(Request $request)
    {
        $request->validate([
            'event_id' => 'required|exists:events,id',
            'user_id' => 'required|exists:users,id',
        ]);

        $this->invitationService->createAndSendInvitation($request->only('event_id', 'user_id'));

        return redirect()->back()->with('success', 'Invitation sent successfully!');
    }

    public function attend($id)
    {
        $invitation = $this->invitationService->getInvitationById($id);
        $event = $invitation->event;
        $invitedUser = $invitation->user;
    
        return view('invitations.attend', compact('invitation', 'event', 'invitedUser'));
    }

    public function rsvpLists()
    {
        $rsvpLists = $this->invitationService->getRsvpLists();

        return view('invitations.rsvp', [
            'pendingInvitations' => $rsvpLists['pending'],
            'acceptedInvitations' => $rsvpLists['accepted'],
            'declinedInvitations' => $rsvpLists['declined'],
        ]);
    }

    public function update(Request $request, $id)
    {
        $status = $request->input('attending') == 1 ? 'accepted' : 'declined';
        $this->invitationService->updateRsvpStatus($id, $status);
    }
}
