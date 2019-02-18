<?php

namespace DareToConquer;

use Illuminate\Database\Eloquent\Model;
use DareToConquer\Services\Markdowner;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Testimonial extends Model implements HasMedia
{
    use HasMediaTrait;

    protected $fillable = [
    	'content', 'active', 'user_id'
    ];

    public function user()
    {
    	return $this->belongsTo('DareToConquer\User');
    }

    public function setContentAttribute($value)
    {
        $markdown = new Markdowner();

        $this->attributes['content'] = $markdown->toHTML($value);
    }
}