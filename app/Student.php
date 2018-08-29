<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
	use Notifiable;

	protected $fillable = [
        'name', 'email', 'password', 'college', 'mobile', 'ticket_id', 'isLocalite', 'place', 'registHash', 'attend', 'amountPaid'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];



    public function college()
    {
    	return $this->belongsTo(College::class);
    }

    public function event()
    {
    	return $this->belongsToMany(Event::class, 'student_events');
    }
}
