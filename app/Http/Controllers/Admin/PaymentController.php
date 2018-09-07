<?php

namespace App\Http\Controllers\Admin;

use App\College;
use App\Event;
use App\Eventheads;
use App\Http\Controllers\Controller;
use App\Student;
use App\StudentEvents;
use App\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;

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

    public function editStudentShow($id)
    {
    	$student = Student::find($id);
    	$colleges = College::all();
    	$teams = Student::distinct('team')->pluck('team');
    	$events = StudentEvents::where('student_id', $id)->get();
    	$allEvents = Event::all();

    	if($events->count() > 0) {
    		foreach ($events as $event) {
    			$event->event_id = Event::find($event->event_id);
    		}
    	}

    	return view('Eventheads.editStudent')
    	->with(compact('student'))
    	->with(compact('teams'))
    	->with(compact('events'))
    	->with(compact('allEvents'))
    	->with(compact('colleges'));
    }

    public function editStudentUpdate($id, Request $request)
    {
    	// return $request->college_id;
    	$student = Student::find($id);

    	$student->college_id = $request->college_id;
    	$student->team = $request->teams;
    	$student->name = $request->name;
    	$student->mobile = $request->mobile;
    	$student->password = Hash::make($request->password);
    	// return $student;
    	$student->save();

    	return redirect(route('admin.home'))
    	->with('message', 'Student Edited '.$student->name.' from '.College::find($student->college_id)->name.', in Cash.');
    }

    public function editStudentDelete($id)
    {
    	$student = Student::find($id);
    	$studentDel = $student;
    	$studentDel->delete();

    	return redirect(route('admin.home'))
    	->with('message', 'Student Deleted '.$student->name.' from '.College::find($student->college_id)->name.', in Cash.');
    }

    public function reports()
    {
    	$teams = Team::all();
    	$eventheads = Eventheads::all();
    	$colleges = College::join('students', 'students.college_id', '=', 'colleges.id')
    						->groupBy('colleges.id')
    						->get(['colleges.id', 'colleges.name', DB::raw('count(students.id) as students')]);

    	return Response::json([
    		'teamsCount' => $teams->count(),
    		'teams' => $teams,
    		'eventheadsCount' => $eventheads->count(),
    		'eventheads' => $eventheads,
    		'collegeCount' => $colleges->count(),
    		'colleges' => $colleges
    	], 200);
    }

    public function unEnrollStudent($id)
    {
    	StudentEvents::find($id)->delete();

    	return redirect()->back()
    	->with('message', 'Event Un-Enrollment done for this Student.');
    }

    public function enrollStudent(Request $request)
    {
    	$this->validate($request, [
    		'event_id' => 'required',
    	]);

    	$studentEvent = new StudentEvents;
    	$studentEvent->student_id = $request->student_id;
    	$studentEvent->event_id = $request->event_id;
    	$studentEvent->subEvent = $request->subEvent;
    	$studentEvent->enrollStatus = 1;
    	$studentEvent->save();

    	return redirect()->back()
    	->with('message', 'Event Enrollment done for this Student.');
    }
}
