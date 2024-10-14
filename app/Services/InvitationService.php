<?php

namespace App\Services;

use App\Mail\EventNotificationMail;
use App\Repositories\InvitationRepositoryInterface;
use Illuminate\Support\Facades\Mail;

class InvitationService
{
    protected $invitationRepository;

    public function __construct(InvitationRepositoryInterface $invitationRepository)
    {
        $this->invitationRepository = $invitationRepository;
    }

    public function getAllPaginated($perPage = 3)
    {
        return $this->invitationRepository->getAllPaginated($perPage);
    }

    public function createAndSendInvitation($data)
    {
        $invitation = $this->invitationRepository->create([
            'event_id' => $data['event_id'],
            'user_id' => $data['user_id'],
            'rsvp_status' => 'pending',
        ]);

        Mail::to($invitation->user->email)->send(new EventNotificationMail($invitation->event, $invitation));
        return $invitation;
    }

    public function getInvitationById($id)
    {
        return $this->invitationRepository->findById($id);
    }
    
    public function getRsvpLists()
    {
        return [
            'pending' => $this->invitationRepository->getByStatus('pending'),
            'accepted' => $this->invitationRepository->getByStatus('accepted'),
            'declined' => $this->invitationRepository->getByStatus('declined'),
        ];
    }

    public function updateRsvpStatus($id, $status)
    {
        $this->invitationRepository->updateStatus($id, $status);
    }
}
