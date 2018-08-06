<?php

namespace Moobology;

use Illuminate\Database\Eloquent\Model;

class Objective extends Model
{
	protected $fillable = [
    	'title', 'lesson_id',
    ];

    public function lesson()
    {
    	return $this->belongsTo('Moobology\Lesson');
    }

    public function users()
    {
    	return $this->belongsToMany('Moobology\User')->withTimestamps;
    }
}