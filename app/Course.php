<?php

namespace DareToConquer;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use DareToConquer\Services\Markdowner;

class Course extends Model
{
    use Sluggable;

    protected $fillable = [
    	'name', 'slug', 'description', 'price', 'active',
    ];

    public function modules()
    {
        return $this->hasMany('DareToConquer\Module');
    }

    public function less()
    {
    	return $this->hasMany('DareToConquer\Lesson');
    }

    public function users()
    {
        return $this->belongsToMany('DareToConquer\User')->withTimestamps();
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function setDescriptionAttribute($value)
    {
        $markdown = new Markdowner();

        $this->attributes['description'] = $markdown->toHTML($value);
    }
}
