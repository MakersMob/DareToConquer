<?php

namespace Momosity;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Momosity\Services\Markdowner;

class Lesson extends Model
{
    use Sluggable;

    protected $fillable = [
    	'name', 'slug', 'content', 'module_id', 'course_id', 'order',
    ];

    public function course()
    {
    	return $this->belongsTo('Momosity\Course');
    }

    public function module()
    {
    	return $this->belongsTo('Momosity\Module');
    }

    public function objectives()
    {
        return $this->hasMany('Momosity\Objective');
    }

    public function worksheets()
    {
        return $this->hasMany('Momosity\Worksheet');
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

    public function setContentAttribute($value)
    {
        $markdown = new Markdowner();

        $this->attributes['content'] = $markdown->toHTML($value);
    }
}
