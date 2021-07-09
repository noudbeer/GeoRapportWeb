<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LoginCredentialsMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $password;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $data, $password)
    {
        $this->data = $data;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('GéoRapport - Identifiant de connexion')
                    ->markdown('emails.loginCredentials');
    }
}
