<?php

namespace DareToConquer;

use Illuminate\Database\Eloquent\Model;
use DareToConquer\Services\Markdowner;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
//use Laravel\Scout\Searchable;

class Article extends Model implements HasMedia
{
    use HasMediaTrait, Searchable;

    protected $fillable = [
    	'title', 'slug', 'content', 'summary', 'seo_title', 'active'
    ];

    public function setContentAttribute($value)
    {
        $markdown = new Markdowner();

        $this->attributes['content'] = $markdown->toHTML($value);
    }
}
