<?php

namespace DareToConquer;

use Illuminate\Database\Eloquent\Model;
use DareToConquer\Services\Markdowner;

class Journey extends Model
{
    protected $fillable = [
    	'title', 'slug', 'summary', 'seo_title', 'active', 'price', 'description'
    ];

    public function stops()
    {
    	return $this->hasMany('DareToConquer\Stop');
    }

    public function users()
    {
        return $this->belongsToMany('DareToConquer\User')->withTimestamps();
    }

    public function setContentAttribute($value)
    {
        $markdown = new Markdowner();

        $this->attributes['content'] = $markdown->toHTML($value);
    }
}
