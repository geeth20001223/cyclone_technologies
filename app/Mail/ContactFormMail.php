<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    public string $senderName;
    public string $senderEmail;
    public string $senderPhone;
    public string $mailSubject;
    public string $userMessage;

    public function __construct(string $name, string $email, string $phone, string $subject, string $message)
    {
        $this->senderName    = $name;
        $this->senderEmail   = $email;
        $this->senderPhone   = $phone;
        $this->mailSubject   = $subject;
        $this->userMessage   = $message;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '📩 Contact Form: ' . $this->mailSubject,
            replyTo: [
                new \Illuminate\Mail\Mailables\Address($this->senderEmail, $this->senderName),
            ],
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.contact-form',
        );
    }
}
