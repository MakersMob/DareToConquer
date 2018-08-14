<?php

namespace DareToConquer;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use DareToConquer\Services\Markdowner;

class Lesson extends Model
{
    use Sluggable;

    protected $fillable = [
    	'name', 'slug', 'content', 'module_id', 'course_id', 'order',
    ];

    public function course()
    {
    	return $this->belongsTo('DareToConquer\Course');
    }

    public function module()
    {
    	return $this->belongsTo('DareToConquer\Module');
    }

    public function objectives()
    {
        return $this->hasMany('DareToConquer\Objective');
    }

    public function worksheets()
    {
        return $this->hasMany('DareToConquer\Worksheet');
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

    public function setContentAttribute($value)
    {
        $markdown = new Markdowner();

        $this->attributes['content'] = $markdown->toHTML($value);
    }
}
