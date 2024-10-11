<h2>Hello {{ $invitedUser->name }},</h2>

    <p>You have been invited to attend the following event:</p>

    <h3>Event Details:</h3>
    <p><strong>Title:</strong> {{ $event->title }}</p>
    <p><strong>Date:</strong> {{ $event->date }}</p>
    <p><strong>Location:</strong> {{ $event->location }}</p>
    <p><strong>Description:</strong> {{ $event->description }}</p>

    <h3>Your RSVP Status: {{ $invitedUser->rsvp_status }}</h3>
    <p>Please click the link below to update your RSVP status:</p>
    
    <p>
        <a href="" target="_blank">
            Confirm Attendance
        </a>
    </p>

    <p>We look forward to seeing you at the event!</p>

    <p>Thank you!</p>