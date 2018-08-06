<?php

namespace Moobology;

use Illuminate\Database\Eloquent\Model;
use Moobology\Services\Markdowner;
use Auth;

class Worksheetanswer extends Model
{
	protected $fillable = [
    	'answer', 'user_id', 'worksheet_id',
    ];

    public function user()
    {
    	return $this->belongsTo('Moobology\User');
    }

    public function worksheet()
    {
        return $this->belongsTo('Moobology\Worksheet');
    }

    public function setAnswerAttribute($value)
    {
        $markdown = new Markdowner();

        $this->attributes['answer'] = $markdown->toHTML($value);
    }
}
