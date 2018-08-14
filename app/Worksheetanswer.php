<?php

namespace DareToConquer;

use Illuminate\Database\Eloquent\Model;
use DareToConquer\Services\Markdowner;
use Auth;

class Worksheetanswer extends Model
{
	protected $fillable = [
    	'answer', 'user_id', 'worksheet_id',
    ];

    public function user()
    {
    	return $this->belongsTo('DareToConquer\User');
    }

    public function worksheet()
    {
        return $this->belongsTo('DareToConquer\Worksheet');
    }

    public function setAnswerAttribute($value)
    {
        $markdown = new Markdowner();

        $this->attributes['answer'] = $markdown->toHTML($value);
    }
}
