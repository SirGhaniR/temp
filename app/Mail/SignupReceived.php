
<?php

namespace App\Mail;

use App\Models\Signup;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SignupReceived extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public Signup $signup)
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New PPLG signup: ' . $this->signup->email,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.signup-received',
            with: ['signup' => $this->signup],
        );
    }
}

