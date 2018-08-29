<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class College extends Model
{
    public function student()
    {
    	return $this->hasMany(Student::class);
    }
}
