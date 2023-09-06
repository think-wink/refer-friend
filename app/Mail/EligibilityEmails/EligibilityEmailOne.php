<?php

namespace App\Mail\EligibilityEmails;

use App\Models\Customer\Referred;
use App\Models\EmailTemplates;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EligibilityEmailOne extends Mailable
{
    use Queueable, SerializesModels;

    private $email_template;
    protected Referred $receiver;

    /**
     * Create a new message instance.
     */
    public function __construct($receiver)
    {
        $this->email_template = EmailTemplates::where('type', 'eligibility_email_1')->first();
        $this->receiver = $receiver;
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
            markdown: 'emails.hsc-email-template',
            with: [
                'cover_image' => $this->email_template->cover_image,
                'greeting_text' => str_replace('{receiver_first_name}', $this->receiver->first_name, $this->email_template->greeting_text),
                'upper_text' => $this->email_template->upper_text,
                'button_text' => $this->email_template->button_text,
                'button_url' => $this->email_template->button_url,
                'lower_text' => $this->email_template->lower_text,
                'receiver_uuid' => $this->receiver->uuid,
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
        $attachments = [
            Attachment::fromPath(public_path('/img/refer/header.png'))->as('header.png')->withMime('image/png'),
            Attachment::fromPath(public_path('/img/refer/footer.png'))->as('footer.png')->withMime('image/png'),
            Attachment::fromPath(public_path('/img/refer/pre-footer-1.png'))->as('pre-footer-1.png')->withMime('image/png'),
            Attachment::fromPath(public_path('/img/refer/pre-footer-2.png'))->as('pre-footer-2.png')->withMime('image/png'),
        ];
        if($this->email_template->cover_image){
           $attachments[] = Attachment::fromPath(public_path($this->email_template->cover_image))->as('cover');
        };
        return $attachments;
    }
}
