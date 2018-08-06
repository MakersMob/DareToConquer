<?php

namespace Momosity;

use Illuminate\Database\Eloquent\Model;

class Objective extends Model
{
	protected $fillable = [
    	'title', 'lesson_id',
    ];

    public function lesson()
    {
    	return $this->belongsTo('Momosity\Lesson');
    }

    public function users()
    {
    	return $this->belongsToMany('Momosity\User')->withTimestamps;
    }
}