<?php

namespace DareToConquer;

use Illuminate\Database\Eloquent\Model;
use DareToConquer\Worksheetanswer;
use Auth;

class Worksheet extends Model
{
	protected $fillable = [
    	'description', 'lesson_id',
    ];

    public function lesson()
    {
    	return $this->belongsTo('DareToConquer\Lesson');
    }

    public function worksheetanswered($worksheet_id)
    {
        $answered = Worksheetanswer::where('worksheet_id', $worksheet_id)->where('user_id', Auth::user()->id)->first();

        return $answered;
    }
}
