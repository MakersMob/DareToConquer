<?php

namespace DareToConquer;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Cashier\Billable;
use DareToConquer\Worksheetanswer;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, Billable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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
}
