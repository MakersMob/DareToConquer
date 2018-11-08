<?php

namespace DareToConquer;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use DareToConquer\Services\Markdowner;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Stop extends Model implements HasMedia
{
    use Sluggable, HasMediaTrait;

    protected $fillable = [
    	'name', 'slug', 'content', 'journey_id', 'order', 'active', 'path_id'
    ];

    public function journey()
    {
    	return $this->belongsTo('DareToConquer\Journey');
    }

    public function setContentAttribute($value)
    {
        $markdown = new Markdowner();

        $this->attributes['content'] = $markdown->toHTML($value);
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
