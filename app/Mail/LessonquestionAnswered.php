<?php

namespace DareToConquer\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use DareToConquer\User;
use DareToConquer\Lessonanswer;

class LessonquestionAnswered extends Mailable
{
    use Queueable, SerializesModels;

    public $user, $answer;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Lessonanswer $answer, User $user)
    {
        $this->answer = $answer;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('scrivs@daretoconquer.com', 'Scrivs')
                    ->subject('Your DTC Question Answered')
                    ->view('emails.lesson.answer');
    }
}
