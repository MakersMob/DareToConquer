<?php

namespace Moobology;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Moobology\Services\Markdowner;

class Module extends Model
{
    use Sluggable;

    protected $fillable = [
    	'name', 'slug', 'description', 'course_id', 'order',
    ];

    public function course()
    {
    	return $this->belongsTo('Moobology\Course');
    }

    public function less()
    {
        return $this->hasMany('Moobology\Lesson');
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
