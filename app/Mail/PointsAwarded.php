<?php

namespace DareToConquer\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use DareToConquer\User;
use DareToConquer\Task;
use DareToConquer\Exchange;

class PointsAwarded extends Mailable
{
    use Queueable, SerializesModels;

    public $user, $tasker, $task, $exchange;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, User $tasker, Task $task, Exchange $exchange)
    {
        $this->user = $user;
        $this->tasker = $tasker;
        $this->task = $task;
        $this->exchange = $exchange;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Hi '.$this->tasker->first_name.', '.$this->user->first_name.' has rewarded you points.')->view('emails.task.rewarded');
    }
}
