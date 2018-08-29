<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public function student()
    {
    	return $this->belongsToMany(Student::class, 'student_events');
    }

    public function eventHead()
    {
    	return $this->hasMany(Eventheads::class);
    }
}
