<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Serie;


class ApprovedSerie extends Mailable
{
    use Queueable, SerializesModels;

    public $serie;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Serie $serie)
    {
        $this->serie = $serie;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.approved-serie')
                    ->subject('Serie aprobada');
    }
}
