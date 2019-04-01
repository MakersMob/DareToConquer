<?php

namespace DareToConquer;

use Illuminate\Database\Eloquent\Model;
use DareToConquer\Services\Markdowner;

class Feedback extends Model
{
	protected $fillable = ['feedback', 'answer_id'];

	public function answer()
	{
		return $this->belongsTo('DareToConquer\Answer');
	}

    public function setFeedbackAttribute($value)
    {
    	$markdown = new Markdowner();

    	$this->attributes['feedback'] = $markdown->toHTML($value);
    }
}
