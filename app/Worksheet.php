<?php

namespace Momosity;

use Illuminate\Database\Eloquent\Model;
use Momosity\Worksheetanswer;
use Auth;

class Worksheet extends Model
{
	protected $fillable = [
    	'description', 'lesson_id',
    ];

    public function lesson()
    {
    	return $this->belongsTo('Momosity\Lesson');
    }

    public function worksheetanswered($worksheet_id)
    {
        $answered = Worksheetanswer::where('worksheet_id', $worksheet_id)->where('user_id', Auth::user()->id)->first();

        return $answered;
    }
}
