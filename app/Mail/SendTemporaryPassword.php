<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendTemporaryPassword extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $password;
    /**
     * Create a new message instance.
     */
    public function __construct($name, $password)
    {
        //
        $this->name = $name;
        $this->password = $password;
    }
    public function build(){
        return $this->subject(' Your Temporary Password')
        ->view('emails.temporary-password');
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Send Temporary Password',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'view.name',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
