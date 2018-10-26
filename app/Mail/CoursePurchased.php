<?php

namespace DareToConquer\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use DareToConquer\User;
use DareToConquer\Course;

class CoursePurchased extends Mailable
{
    use Queueable, SerializesModels;

    public $user, $course;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, Course $course)
    {
        $this->user = $user;
        $this->course = $course;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        switch ($this->course->slug) {
            case 'pinterest':
                $email = 'emails.course.pinterest';
                break;
            
            default:
                $email = 'thanks';
                break;
        }
        return $this->from('scrivs@daretoconquer.com')
                    ->view($email);
    }
}
