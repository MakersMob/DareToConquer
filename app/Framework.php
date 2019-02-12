<?php

namespace DareToConquer;

use Illuminate\Database\Eloquent\Model;
use DareToConquer\Services\Markdowner;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Framework extends Model implements HasMedia
{
    use HasMediaTrait;

    protected $fillable = [
    	'title', 'slug', 'content', 'summary', 'seo_title', 'active', 'order', 'section_id'
    ];

    public function section()
    {
    	return $this->belongsTo('DareToConquer\Section');
    }

    public function setContentAttribute($value)
    {
        $markdown = new Markdowner();

        $this->attributes['content'] = $markdown->toHTML($value);
    }
}