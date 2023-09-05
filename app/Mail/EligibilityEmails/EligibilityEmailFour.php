<?php

namespace App\Mail\EligibilityEmails;

use App\Models\EmailTemplates;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EligibilityEmailFour extends Mailable
{
    use Queueable, SerializesModels;

    private $email_template;
    protected string $receiver_first_name;

    /**
     * Create a new message instance.
     */
    public function __construct($receiver_first_name)
    {
        $this->email_template = EmailTemplates::where('type', 'eligibility_email_4')->first();
        $this->receiver_first_name = $receiver_first_name;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->email_template->subject,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.eligibility-email',
            with: [
                'cover_image' => $this->email_template->cover_image,
                'cover_text' => $this->email_template->cover_text,
                'greeting_text' => str_replace('{receiver_first_name}', $this->receiver_first_name, $this->email_template->greeting_text),
                'upper_text' => $this->email_template->upper_text,
                'button_text' => $this->email_template->button_text,
                'button_url' => $this->email_template->button_url,
                'lower_text' => $this->email_template->lower_text,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
