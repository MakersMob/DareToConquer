<?php

namespace Moobology;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Moobology\Services\Markdowner;

class Lesson extends Model
{
    use Sluggable;

    protected $fillable = [
    	'name', 'slug', 'content', 'module_id', 'course_id', 'order',
    ];

    public function course()
    {
    	return $this->belongsTo('Moobology\Course');
    }

    public function module()
    {
    	return $this->belongsTo('Moobology\Module');
    }

    public function objectives()
    {
        return $this->hasMany('Moobology\Objective');
    }

    public function worksheets()
    {
        return $this->hasMany('Moobology\Worksheet');
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

    public function setContentAttribute($value)
    {
        $markdown = new Markdowner();

        $this->attributes['content'] = $markdown->toHTML($value);
    }
}
