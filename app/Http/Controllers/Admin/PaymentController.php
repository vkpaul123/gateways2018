<?php

namespace App\Http\Controllers\Admin;

use App\College;
use App\Http\Controllers\Controller;
use App\Student;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function takePayment($id)
    {
    	$student = Student::find($id);
    	$student->amountPaid = 1;
    	$student->save();

    	return redirect()->back()
    	->with('message', 'Payment Rs.100/- taken for '.$student->name.' from '.College::find($student->college_id)->name.', in Cash.');
    }
}
