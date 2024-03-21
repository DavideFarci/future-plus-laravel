<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailNotificationAdmin extends Mailable
{
    use Queueable, SerializesModels;

    public $newEmail;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($newEmail)
    {
        $this->newEmail = $newEmail;
    }

    public function build()
    {
        return $this->subject('Nuova email da Future+')
            ->view('reply.emailNotificationAdmin');
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
