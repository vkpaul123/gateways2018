<?php

namespace App\Http\Controllers;

use App\Event;
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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();
        $totalMembers = Student::where('team', Auth::user()->team)->get();
        $eventsEnrolled = StudentEvents::where('student_id', Auth::user()->id)->get();

        return view('student.home')
        ->with(compact('events'))
        ->with(compact('totalMembers'));
    }
}
