<?php

namespace App\Mail;

use App\Models\Student;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class StudentPosted extends Mailable
{
    use Queueable, SerializesModels;

    public $student;
    public $action; // 'created', 'updated', 'deleted'

    /**
     * Create a new message instance.
     */
    public function __construct(Student $student, string $action = 'created')
    {
        $this->student = $student;
        $this->action = $action;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        $subject = match($this->action) {
            'created' => '✅ Yangi Student Qo\'shildi',
            'updated' => '📝 Student Ma\'lumotlari Yangilandi',
            'deleted' => '🗑️ Student O\'chirildi',
            default => 'Student Notification',
        };

        return new Envelope(
            subject: $subject,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.student-posted',
        );
    }

    /**
     * Get the attachments for the message.
     */
    public function attachments(): array
    {
        return [];
    }
}