<?php

namespace DareToConquer;

use Illuminate\Database\Eloquent\Model;
use DareToConquer\Services\Markdowner;

class Challenge extends Model
{
    protected $fillable = [
    	'title', 'status', 'description', 'lesson_id', 'start_date', 'end_date'
    ];

    public function tiers()
    {
    	return $this->hasMany('DareToConquer\Tier');
    }

    public function user()
    {
    	return $this->belongsToMany('DareToConquer\User');
    }

    public function lesson()
    {
    	return $this->belongsTo('DareToConquer\Lesson');
    }

    public function setDescriptionAttribute($value)
    {
        $markdown = new Markdowner();

        $this->attributes['description'] = $markdown->toHTML($value);
    }
}
