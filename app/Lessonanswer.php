<?php

namespace DareToConquer;

use Illuminate\Database\Eloquent\Model;
use DareToConquer\Services\Markdowner;

class Lessonanswer extends Model
{
    protected $fillable = ['lessonquestion_id', 'lesson_id', 'answer'];

    public function lesson()
    {
    	return $this->belongsTo('DareToConquer\Lesson');
    }

    public function question()
    {
    	return $this->belongsTo('DareToConquer\Lessonquestion');
    }

    public function setAnswerAttribute($value)
    {
        $markdown = new Markdowner();

        $this->attributes['answer'] = $markdown->toHTML($value);
    }
}
