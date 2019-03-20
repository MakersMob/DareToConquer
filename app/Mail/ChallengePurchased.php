<?php

namespace DareToConquer\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use DareToConquer\User;
use DareToConquer\Challenge;
use DareToConquer\Tier;

class ChallengePurchased extends Mailable
{
    use Queueable, SerializesModels;

    public $user, $challenge, $tier;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, Challenge $challenge, Tier $tier)
    {
        $this->user = $user;
        $this->challenge = $challenge;
        $this->tier = $tier;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('scrivs@daretoconquer.com', 'Scrivs')
                    ->view('emails.challenge.seo');
    }
}
