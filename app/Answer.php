<?php

namespace DareToConquer;

use Illuminate\Database\Eloquent\Model;
use DareToConquer\Services\Markdowner;
use DareToConquer\Feedback;
use Auth;

class Answer extends Model
{
    protected $fillable = ['user_id', 'exercise_id', 'answer'];

    public function exercise()
    {
    	return $this->belongsTo('DareToConquer\Exercise');
    }

    public function user()
    {
    	return $this->belongsTo('DareToConquer\User');
    }

    public function feedback()
    {
    	return $this->hasOne('DareToConquer\Feedback');
    }

    public function setAnswerAttribute($value)
    {
    	$markdown = new Markdowner();

    	$this->attributes['answer'] = $markdown->toHTML($value);
    }

    public function feedbackReceived($answer_id)
    {
    	$feedback = Feedback::where('answer_id', $answer_id)->first();

        return $feedback;
    }
}
