<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AshokLeylandMail extends Mailable
{
    use Queueable, SerializesModels;

    public $row;

    public $jobcardopen;
  
    public $completion;
    
    public $workstart;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($row, $jobcardopen, $completion, $workstart)
    {
        $this->row = $row;
        $this->jobcardopen = $jobcardopen;
        $this->completion = $completion;
        $this->workstart = $workstart;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Mail from Ashoka Leyland')
                    ->view('emails.qutation');
        
    }
}
