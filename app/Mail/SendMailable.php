<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $name='';
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($companyname)
    {
        $this->name = $companyname;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.company-created')->with(['name' => $this->name]);
    }
}
