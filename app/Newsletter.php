<?php

namespace DareToConquer;

use Illuminate\Database\Eloquent\Model;
use DareToConquer\Services\Markdowner;

class Newsletter extends Model
{
    protected $fillable = [
    	'subject', 'newsletter'
    ];

    public function setNewsletterAttribute($value)
    {
    	$markdown = new Markdowner();

    	$this->attributes['newsletter'] = $markdown->toHTML($value);
    }
}
