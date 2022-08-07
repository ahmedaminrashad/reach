<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ReportEmploys extends Mailable
{
    use Queueable, SerializesModels;


    public function __construct()
    {
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): ReportEmploys
    {
        return $this
            ->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'))
            ->markdown('emails.report_ads');
    }
}
