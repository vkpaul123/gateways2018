<?php

namespace App\Http\Controllers\Admin;

use App\College;
use App\Event;
use App\Http\Controllers\Controller;
use App\Student;
use App\StudentEvents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
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
    
    public function index() {
        if(Auth::user()->event_id <= 12) {
            $event = Event::find(Auth::user()->event_id);
            $students = StudentEvents::where('event_id', Auth::user()->event_id)->get();

            if(isset($students)) {
                foreach ($students as $student) {
                    $student->student_id = Student::find($student->student_id);
                }
            }

        	return view('Eventheads.home')
            ->with(compact('event'))
            ->with(compact('students'));
        } else {
            $students = Student::all();

            foreach ($students as $student) {
                $student->college_id = College::find($student->college_id)->name;
            }

            return view('Eventheads.studentRegistration')
            ->with(compact('students'));
        }
    }

    public function markPresent($student_id, $event_id)
    {
        $student = StudentEvents::where('student_id', $student_id)->where('event_id', $event_id)->update(['attend' => 1]);

        return redirect()->back();
    }

    public function showPrintPage()
    {
        $event = Event::find(Auth::user()->event_id);
        $students = StudentEvents::where('event_id', Auth::user()->event_id)->get();

        if(isset($students)) {
            foreach ($students as $student) {
                $student->student_id = Student::find($student->student_id);
                $student->student_id->college_id = College::find($student->student_id->college_id)->name;
            }
        }

        return view('Eventheads.print')
        ->with(compact('event'))
        ->with(compact('students'));
    }
}
