<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Registration extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * New username
     */
    public $userName;

    /**
     * User id
     */
    public $id;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(String $userName, Int $id)
    {
        $this->emailFrom = "pellizdeva7@gmail.com";
        $this->userName  = $userName;
        $this->id        = $id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->emailFrom)
            ->subject('Welcome!')
            ->view('emails.registration');
    }
}
