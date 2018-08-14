<?php

namespace DareToConquer;

use Illuminate\Database\Eloquent\Model;

class Objective extends Model
{
	protected $fillable = [
    	'title', 'lesson_id',
    ];

    public function lesson()
    {
    	return $this->belongsTo('DareToConquer\Lesson');
    }

    public function users()
    {
    	return $this->belongsToMany('DareToConquer\User')->withTimestamps;
    }
}