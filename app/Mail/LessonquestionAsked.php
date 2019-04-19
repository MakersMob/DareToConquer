<?php

namespace DareToConquer\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use DareToConquer\Lessonquestion;

class LessonquestionAsked extends Mailable
{
    use Queueable, SerializesModels;

    public $question;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Lessonquestion $question)
    {
        $this->question = $question;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('scrivs@daretoconquer.com', 'Scrivs')
                    ->subject('Lesson Question Asked')
                    ->view('emails.lesson.question');
    }
}
