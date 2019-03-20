<?php

namespace DareToConquer;

use Illuminate\Database\Eloquent\Model;

class Tier extends Model
{
    protected $fillable = [
    	'title', 'orders', 'price', 'challenge_id'
    ];

    public function challenge()
    {
    	return $this->belongsTo('DareToConquer\Challenge');
    }
}
