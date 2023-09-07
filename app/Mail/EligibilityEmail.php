<?php

namespace App\Mail;

use App\Models\Customer\Referred;
use App\Models\Customer\Referrer;
use App\Models\EmailTemplates;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EligibilityEmail extends Mailable
{
    use Queueable, SerializesModels;

    private $email_template;
    protected Referred $referred;
    protected Referrer $referrer;

    /**
     * Create a new message instance.
     */
    public function __construct($referred, $email_type)
    {
        $this->email_template = EmailTemplates::where('type', $email_type)->first();
        $this->referred = $referred;
        $this->referrer = $referred->referrer;
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
                'greeting_text' => str_replace('{referred_name}', $this->referred->first_name.' '.$this->referred->last_name, $this->email_template->greeting_text),
                'upper_text' => str_replace('{referrer_name}', $this->referrer->first_name.' '.$this->referrer->last_name, $this->email_template->upper_text),
                'button_text' => $this->email_template->button_text,
                'button_url' => $this->email_template->button_url,
                'lower_text' => $this->email_template->lower_text,
                'referred_uuid' => $this->referred->uuid,
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
        ];
        if($this->email_template->cover_image){
           $attachments[] = Attachment::fromPath(public_path($this->email_template->cover_image))->as('cover');
        };
        return $attachments;
    }
}
