<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Contact extends Mailable
{
    use Queueable, SerializesModels;


    /**
     * The username sender
     */
    protected $userFrom;

    /**
     * The email sender
     */
    protected $emailFrom;

    /**
     * The email message
     */
    public $emailMessage;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(String $emailFrom, String $userFrom, String $emailMessage)
    {
        $this->emailFrom    = $emailFrom;
        $this->userFrom     = $userFrom;
        $this->emailMessage = $emailMessage;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->from($this->emailFrom)
                ->view('emails.email');
    }
}
