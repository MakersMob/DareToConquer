<?php

namespace DareToConquer;

use Illuminate\Database\Eloquent\Model;
use DareToConquer\Services\Markdowner;
use DareToConquer\Answer;
use Auth;

class Exercise extends Model
{
    protected $fillable = ['exercise', 'challenge_id', 'set_id'];

    public function challenge()
    {
    	return $this->belongsTo('DareToConquer\Challenge');
    }

    public function exercise()
    {
    	return $this->belongsTo('DareToConquer\Exercise');
    }

    public function setExerciseAttribute($value)
    {
    	$markdown = new Markdowner();

    	$this->attributes['exercise'] = $markdown->toHTML($value);
    }

    public function exerciseAnswered($exercise_id)
    {
        $answered = Answer::where('exercise_id', $exercise_id)->where('user_id', Auth::user()->id)->first();

        return $answered;
    }
}
