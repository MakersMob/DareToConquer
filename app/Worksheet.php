<?php

namespace Moobology;

use Illuminate\Database\Eloquent\Model;
use Moobology\Worksheetanswer;
use Auth;

class Worksheet extends Model
{
	protected $fillable = [
    	'description', 'lesson_id',
    ];

    public function lesson()
    {
    	return $this->belongsTo('Moobology\Lesson');
    }

    public function worksheetanswered($worksheet_id)
    {
        $answered = Worksheetanswer::where('worksheet_id', $worksheet_id)->where('user_id', Auth::user()->id)->first();

        return $answered;
    }
}
