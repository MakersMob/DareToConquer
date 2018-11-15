<?php

namespace DareToConquer;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Niche extends Model
{
    use Sluggable;

    protected $fillable = [
    	'name', 'slug',
    ];

    // public function blogs()
    // {
    // 	return $this->belongsToMany('DareToConquer\Blog');
    // }

    public function exchanges()
    {
    	return $this->hasMany('DareToConquer\Exchange');
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
