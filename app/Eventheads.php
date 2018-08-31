<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Eventheads extends Authenticatable
{
	use Notifiable;

	protected $fillable = [
        'name', 'email', 'password', 'event_id',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
    

    public function event()
    {
    	return $this->belongsTo(Event::class);
    }
}
