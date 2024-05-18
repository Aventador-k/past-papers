<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendPaper extends Mailable
{
    use Queueable, SerializesModels;

    public $attachment;
    public $reference_code;

    /**
     * Create a new message instance.
     */
    public function __construct($attachment , $reference_code)
    {
        //
        $this->attachment = $attachment;
        $this->reference_code = $reference_code;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Send Paper',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.send',
            with: ['reference_code' => $this->reference_code]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {

        $attach = [
            Attachment::fromStorage($this->attachment)
        ];
        return $attach;
    }
}
