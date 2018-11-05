<?php

namespace DareToConquer;

use Illuminate\Database\Eloquent\Model;
use DareToConquer\Services\Markdowner;

class Service extends Model
{
    protected $fillable = [
    	'name', 'description', 'user_id'
    ];

    public function user()
    {
    	return $this->belongsTo('DareToConquer\User');
    }

    public function setDescriptionAttribute($value)
    {
        $markdown = new Markdowner();

        $this->attributes['description'] = $markdown->toHTML($value);
    }
}
