<?php

namespace DareToConquer;

use Illuminate\Database\Eloquent\Model;
use DareToConquer\Services\Markdowner;

class Win extends Model
{
    protected $fillable = [
    	'user_id', 'description', 'process'
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

    public function setProcessAttribute($value)
    {
        $markdown = new Markdowner();

        $this->attributes['process'] = $markdown->toHTML($value);
    }
}
