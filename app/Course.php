<?php

namespace Momosity;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Momosity\Services\Markdowner;

class Course extends Model
{
    use Sluggable;

    protected $fillable = [
    	'name', 'slug', 'description', 'lessons', 'price', 'active',
    ];

    public function modules()
    {
        return $this->hasMany('Momosity\Module');
    }

    public function less()
    {
    	return $this->hasMany('Momosity\Lesson');
    }

    public function users()
    {
        return $this->belongsToMany('Momosity\User')->withTimestamps();
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
