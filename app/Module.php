<?php

namespace Momosity;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Momosity\Services\Markdowner;

class Module extends Model
{
    use Sluggable;

    protected $fillable = [
    	'name', 'slug', 'description', 'course_id', 'order',
    ];

    public function course()
    {
    	return $this->belongsTo('Momosity\Course');
    }

    public function less()
    {
        return $this->hasMany('Momosity\Lesson');
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
