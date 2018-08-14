<?php

namespace DareToConquer;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use DareToConquer\Services\Markdowner;

class Module extends Model
{
    use Sluggable;

    protected $fillable = [
    	'name', 'slug', 'description', 'course_id', 'order',
    ];

    public function course()
    {
    	return $this->belongsTo('DareToConquer\Course');
    }

    public function less()
    {
        return $this->hasMany('DareToConquer\Lesson');
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
