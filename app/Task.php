<?php

namespace DareToConquer;

use Illuminate\Database\Eloquent\Model;
use DareToConquer\Services\Markdowner;

class Task extends Model
{
    protected $fillable = [
    	'user_id', 'exchange_id', 'comment', 'status', 'url',
    ];

    public function user()
    {
    	return $this->belongsTo('DareToConquer\User');
    }

    public function exchange()
    {
        return $this->belongsTo('DareToConquer\Exchange');
    }

    public function setCommentAttribute($value)
    {
        $markdown = new Markdowner();

        $this->attributes['comment'] = $markdown->toHTML($value);
    }
}
