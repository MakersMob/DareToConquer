<?php

namespace DareToConquer;

use Illuminate\Database\Eloquent\Model;
use DareToConquer\Services\Markdowner;

class Exchange extends Model
{
    protected $fillable = [
    	'user_id', 'url', 'type', 'description', 'status', 'niche'
    ];

    public function user()
    {
    	return $this->belongsTo('DareToConquer\User');
    }

    public function tasks()
    {
    	return $this->hasMany('DareToConquer\Task');
    }

    public function setDescriptionAttribute($value)
    {
    	$markdown = new Markdowner();

    	$this->attributes['description'] = $markdown->toHTML($value);
    }
}
