<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $msgData;

    public function __construct($msgData)
    {
        $this->msgData = $msgData;
    }

    public function build()
    {
        return $this->subject('New Portfolio Message: ' . ($this->msgData['subject'] ?? 'No Subject'))
                    ->view('emails.contact_notification');
    }
}
