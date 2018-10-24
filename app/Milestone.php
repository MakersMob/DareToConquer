<?php

namespace DareToConquer;

use Illuminate\Database\Eloquent\Model;
use DareToConquer\Services\Markdowner;

class Milestone extends Model
{
    protected $fillable = [
    	'name', 'description',
    ];

    public function users()
    {
    	return $this->belongsToMany('DareToConquer\User')->withTimestamps();
    }

    public function setDescriptionAttribute($value)
    {
    	$markdown = new Markdowner();

    	$this->attributes['description'] = $markdown->toHTML($value);
    }
}
