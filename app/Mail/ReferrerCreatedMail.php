<?php

namespace App\Mail;

use App\Models\Customer\Referrer;
use App\Models\EmailTemplate;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Headers;
use Illuminate\Queue\SerializesModels;

class ReferrerCreatedMail extends Mailable
{
    use Queueable, SerializesModels;

    private $email_template;
    protected Referrer $referrer;
    protected string $mail_uuid;

    /**
     * Create a new message instance.
     */
    public function __construct($referrer, $mail_uuid)
    {
        $this->email_template = EmailTemplate::where('type', 'referrer_created')->first();
        $this->referrer = $referrer;
        $this->mail_uuid = $mail_uuid;
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

    public function headers(): Headers
    {
        return new Headers(
            text: [
                'X-Model-ID' => $this->mail_uuid,
            ]
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
                'cover_text' => $this->email_template->cover_text,
                'greeting_text' => $this->email_template->greeting_text,
                'upper_text' => str_replace('{referrer_uuid}', $this->referrer->uuid, $this->email_template->upper_text),
                'button_text' => $this->email_template->button_text,
                'button_url' => $this->email_template->button_url,
                'lower_text' => $this->email_template->lower_text,
                'receiver_type' => 'referrer',
                'receiver_uuid' => $this->referrer->uuid,
                'mail_uuid' => $this->mail_uuid,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, Attachment>
     */
    public function attachments(): array
    {
        $attachments = [
            Attachment::fromPath(public_path('/img/refer-email/header.png'))->as('header.png')->withMime('image/png'),
            Attachment::fromPath(public_path('/img/refer-email/footer.png'))->as('footer.png')->withMime('image/png'),
            Attachment::fromPath(public_path('/img/refer-email/pre-footer-1.png'))->as('pre-footer-1.png')->withMime('image/png'),
            Attachment::fromPath(public_path('/img/refer-email/pre-footer-2.png'))->as('pre-footer-2.png')->withMime('image/png'),
            Attachment::fromPath(public_path('/img/icons/facebook.png'))->as('facebook.png')->withMime('image/png'),
            Attachment::fromPath(public_path('/img/icons/linkedin.png'))->as('linkedin.png')->withMime('image/png'),
            Attachment::fromPath(public_path('/img/icons/twitter.png'))->as('twitter.png')->withMime('image/png'),
            Attachment::fromPath(public_path('/img/icons/youtube.png'))->as('youtube.png')->withMime('image/png'),
        ];
        if($this->email_template->cover_image){
           $attachments[] = Attachment::fromPath(public_path($this->email_template->cover_image))->as('cover');
        };
        return $attachments;
    }
}
