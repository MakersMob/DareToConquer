<?php

namespace DareToConquer;

use Illuminate\Database\Eloquent\Model;
use DareToConquer\Services\Markdowner;

class Note extends Model
{
    protected $fillable = ['notes', 'user_id', 'lesson_id', 'course_id', 'module_id'];

    public function lesson()
    {
    	return $this->belongsTo('DareToConquer\Note');
    }

    public function module()
    {
        return $this->belongsTo('DareToConquer\Module');
    }

    public function course()
    {
        return $this->belongsTo('DareToConquer\Course');
    }

    public function user()
    {
    	return $this->belongsTo('DareToConquer\User');
    }

    public function setNotesAttribute($value)
    {
    	$markdown = new Markdowner();

    	$this->attributes['notes'] = $markdown->toHTML($value);
    }
}
