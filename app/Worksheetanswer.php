<?php

namespace Momosity;

use Illuminate\Database\Eloquent\Model;
use Momosity\Services\Markdowner;
use Auth;

class Worksheetanswer extends Model
{
	protected $fillable = [
    	'answer', 'user_id', 'worksheet_id',
    ];

    public function user()
    {
    	return $this->belongsTo('Momosity\User');
    }

    public function worksheet()
    {
        return $this->belongsTo('Momosity\Worksheet');
    }

    public function setAnswerAttribute($value)
    {
        $markdown = new Markdowner();

        $this->attributes['answer'] = $markdown->toHTML($value);
    }
}
