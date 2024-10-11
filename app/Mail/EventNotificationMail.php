<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EventNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $event;
    public $invitedUser;

    public function __construct($event, $invitedUser)
{
    $this->event = $event;
    $this->invitedUser = $invitedUser;
}

public function build()
{
    return $this->subject('You are invited to ' . $this->event->title)
                ->view('emails.invitation')
                ->with([
                    'event' => $this->event,
                    'invitedUser' => $this->invitedUser,
                ]);
}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Event Invitation',
            from: 'admin@savilasi.com'
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.notification'
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
