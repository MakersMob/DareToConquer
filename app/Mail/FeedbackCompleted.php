<?php

namespace DareToConquer\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use DareToConquer\User;
use DareToConquer\Set;

class FeedbackCompleted extends Mailable
{
    use Queueable, SerializesModels;

    public $user, $set;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, Set $set)
    {
        $this->user = $user;
        $this->set = $set;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('scrivs@daretoconquer.com', 'Scrivs')->view('emails.set.feedback');
    }
}
