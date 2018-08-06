<?php

namespace Moobology;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Moobology\Services\Markdowner;

class Course extends Model
{
    use Sluggable;

    protected $fillable = [
    	'name', 'slug', 'description', 'lessons', 'price', 'active',
    ];

    public function modules()
    {
        return $this->hasMany('Moobology\Module');
    }

    public function less()
    {
    	return $this->hasMany('Moobology\Lesson');
    }

    public function users()
    {
        return $this->belongsToMany('Moobology\User')->withTimestamps();
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
