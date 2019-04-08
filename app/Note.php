<?php

namespace DareToConquer;

use Illuminate\Database\Eloquent\Model;
use DareToConquer\Services\Markdowner;

class Note extends Model
{
    protected $fillable = ['notes', 'user_id', 'lesson_id'];

    public function lesson()
    {
    	return $this->belongsTo('DareToConquer\Note');
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
