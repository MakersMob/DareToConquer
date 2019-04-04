<?php

namespace DareToConquer;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Cashier\Billable;
use DareToConquer\Worksheetanswer;
use DareToConquer\Lesson;
use DareToConquer\Stop;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Scout\Searchable;
use Auth;

class User extends Authenticatable
{
    use Notifiable, Billable, HasRoles, Searchable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password', 'first_name', 'last_name', 'points'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function objectives()
    {
        return $this->belongsToMany('DareToConquer\Objective')->withTimestamps();
    }

    public function lessons()
    {
        return $this->belongsToMany('DareToConquer\Lesson')->withTimestamps();
    }

    public function courses()
    {
        return $this->belongsToMany('DareToConquer\Course')->withTimestamps();
    }

    public function journeys()
    {
        return $this->belongsToMany('DareToConquer\Journey')->withTimestamps();
    }

    public function stops()
    {
        return $this->belongsToMany('DareToConquer\Stop')->withTimestamps();
    }

    public function milestones()
    {
        return $this->belongsToMany('DareToConquer\Milestone')->withTimestamps();
    }

    public function services()
    {
        return $this->hasMany('DareToConquer\Service');
    }

    public function tasks()
    {
        return $this->hasMany('DareToConquer\Task');
    }

    public function payments()
    {
        return $this->hasMany('DareToConquer\Payment');
    }

    public function testimonials()
    {
        return $this->hasMany('DareToConquer\Testimonial');
    }

    public function challenges()
    {
        return $this->belongsToMany('DareToConquer\Challenge');
    }

    public function answers()
    {
        return $this->hasMany('DareToConquer\Answer');
    }

    public function sets()
    {
        return $this->belongsToMany('DareToConquer\Set')->withTimestamps()->withPivot('feedback');
    }

    public function lessonCompleted($id)
    {
        $pivot = Auth::user()->lessons()->wherePivot('lesson_id', $id)->first();
        //dd($pivot);
        return $pivot;
    }

    public function stopCompleted($id)
    {
        $pivot = Auth::user()->stops()->wherePivot('stop_id', $id)->first();
        //dd($pivot);
        return $pivot;
    }

    public function setCompleted($user_id, $set_id)
    {
        $user = User::find($user_id);
        $result = User::sets()->wherePivot('set_id', $set_id)->wherePivot('feedback', 1)->first();

        return $result;
    }
}
