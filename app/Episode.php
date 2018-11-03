<?php

namespace DareToConquer;

use Illuminate\Database\Eloquent\Model;
use DareToConquer\Services\Markdowner;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Episode extends Model implements HasMedia
{
    use HasMediaTrait, Sluggable;

    protected $fillable = [
    	'title', 'slug', 'content', 'summary', 'seo_title', 'active', 'youtube', 'season'
    ];

    public function setContentAttribute($value)
    {
        $markdown = new Markdowner();

        $this->attributes['content'] = $markdown->toHTML($value);
    }
}