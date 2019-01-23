<?php

namespace DareToConquer;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use DareToConquer\Services\Markdowner;

class Biz extends Model
{
	use Sluggable;

    protected $fillable = [
    	'name', 'url', 'pinterest', 'twitter', 'facebook', 'instagram', 'user_id', 'slug', 'description', 'guest_post', 'guest_post_description', 'feed'
    ];

    public function user()
    {
    	return $this->belongsTo('DareToConquer\User');
    }

    public function subscriptions()
    {
        return $this->hasMany('DareToConquer\Subscription');
    }

    public function niches()
    {
        return $this->belongsToMany('DareToConquer\Niche');
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

    public function setGuestPostDescriptionAttribute($value)
    {
        $markdown = new Markdowner();

        $this->attributes['guest_post_description'] = $markdown->toHTML($value);
    }
}