<?php

namespace DareToConquer;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use DareToConquer\Services\Markdowner;
use Laravel\Scout\Searchable;

class Question extends Model
{
	use Searchable;
	
    protected $fillable = [
    	'question', 'category', 'slug', 'answer', 'description',
    ];

    public function setAnswerAttribute($value)
    {
        $markdown = new Markdowner();

        $this->attributes['answer'] = $markdown->toHTML($value);
    }
}
