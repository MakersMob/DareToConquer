<?php

namespace DareToConquer;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [ 
    	'item', 'type', 'type_id', 'price', 'user_id'
    ];

    public function user()
    {
    	return $this->belongsTo('DareToConquer\User');
    }
}
