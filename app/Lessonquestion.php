<?php

namespace DareToConquer;

use Illuminate\Database\Eloquent\Model;
use DareToConquer\Services\Markdowner;

class Lessonquestion extends Model
{
    protected $fillable = ['user_id', 'lesson_id', 'question'];

    public function lesson()
    {
    	return $this->belongsTo('DareToConquer\Lesson');
    }

    public function user()
    {
    	return $this->belongsTo('DareToConquer\User');
    }

    public function answer()
    {
    	return $this->hasOne('DareToConquer\Lessonanswer');
    }

    public function setQuestionAttribute($value)
    {
        $markdown = new Markdowner();

        $this->attributes['question'] = $markdown->toHTML($value);
    }
}
