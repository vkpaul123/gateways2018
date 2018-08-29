<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class EventController extends Controller
{
	//	NEW EVENT CREATE
    public function createNewEvent(Request $request)
    {
    	$response = null;

    	try {
    		$event = new Event;

            $event->name = $request->name;
    		$event->commonName = $request->commonName;
    		$event->location = $request->location;
    		$event->time = $request->time;
    		$event->rounds = $request->rounds;
    		$event->if_team = $request->if_team;
    		if($event->if_team)
    			$event->members = $request->members;

    		$event->organizer = $request->organizer;
    		$event->mobile = $request->mobile;

    		$event->save();

    		$response = [
    			'code' => '8',
    			'status' => 'OK',
    			'description' => 'New Event Added Successfully!'
    		];

    		return json_encode($response);

    	} catch (\Exception $e) {
    		$response = [
    			'code' => '-21',
    			'status' => 'Error',
    			'description' => 'Error in adding a new Event. Already exists',
    			'e' => $e
    		];

    		return json_encode($response);
    	}
    }

    //	RETURN ALL EVENT DETAILS
    public function allEventDetails()
    {
    	$response = null;

    	$events = Event::all();

    	try {
    		if($events->count() != 0) {
    			$response = [
	    			'code' => '9',
	    			'status' => 'OK',
	    			'description' => 'Events found',
	    			'events' => [
	    				'count' => $events->count(),
	    				'details' => $events->toArray()
	    			]
	    		];

	    		return json_encode($response);
    		} else {
    			$response = [
	    			'code' => '-23',
	    			'status' => 'Error',
	    			'description' => 'No events added yet. Event count is zero.'
	    		];

	    		return json_encode($response);
    		}
    	} catch (\Exception $e) {
    		$response = [
    			'code' => '-22',
    			'status' => 'Error',
    			'description' => 'Some other error while fetching all event details.',
    			'e' => $e
    		];

    		return json_encode($response);
    	}
    }

    public function studentsInThisEvent($event_id, $subEvent)
    {
    	$response = null;
    	$students = null;

    	try {
    		if($event_id == env('GAMING_EVENT_ID')) {
    			$students = Event::whereHas('students', function($q) {
    				$q->whereSubEvent($subEvent);
    			})->get();
    		} else {
    			$students = Event::find($event_id)->student()->get();
    		}

    		if($students->count() > 0) {
    			$response = [
	    			'code' => '13',
	    			'status' => 'OK',
	    			'description' => 'Students found for this event',
	    			'students' => [
	    				'count' => $students->count(),
	    				'details' => $students->toArray()
	    			]
	    		];

	    		return json_encode($response);
    		} else {
    			$response = [
	    			'code' => '-33',
	    			'status' => 'Error',
	    			'description' => 'No students enrolled yet.'
	    		];

	    		return json_encode($response);
    		}
    	} catch (\Exception $e) {
    		$response = [
    			'code' => '-34',
    			'status' => 'Error',
    			'description' => 'Some other error while fetching all student details for this event.',
    			'e' => $e
    		];

    		return json_encode($response);
    	}
    }

    //  UPDATE EVENT
    public function updateEvent(Request $request)
    {
        $response = null;

        try {
            $event = Event::find($request->id);
            $event->name = $request->name;
            $event->commonName = $request->commonName;
            $event->location = $request->location;
            $event->time = $request->time;
            $event->rounds = $request->rounds;
            $event->if_team = $request->if_team;
            if($request->if_team)
                $event->members = $request->members;
            $event->organizer = $request->organizer;
            $event->mobile = $request->mobile;
            $event->save();

            $response = [
                'code' => '8',
                'status' => 'OK',
                'description' => 'Event Updated Successfully!'
            ];

            return json_encode($response);  

        } catch (\Exception $e) {
            $response = [
                'code' => '-34',
                'status' => 'Error',
                'description' => 'Some other error while updating details for this event.',
                'e' => $e
            ];

            return json_encode($response);
        }
    }

    public function parseEventsxlsxFile(Request $request)
    {
        $response = null;
        try {
            if($request->hasFile('import_file_events')) {
                $path = $request->file('import_file_events')->getRealPath();

                $data = Excel::load($path, function($reader) {})->get([
                    'name',
                    'commonname',
                    'description',
                    'location',
                    'qrcodehash',
                    'time',
                    'if_team',
                    'members',
                    'organizer',
                    'mobile',
                    'photo',
                    'rules',
                ]);
                
                if(!empty($data) && $data->count()) {
                    foreach ($data as $value) {
                        if (!empty($value)) {
                            foreach ($value as $key) {
                                if($key == null) {
                                    $response = [
                                        'code' => '14',
                                        'status' => 'Error',
                                        'description' => 'Please Check your file. Some Fields are empty.',
                                        'value' => $value
                                    ];
                                    return json_encode($response);
                                }
                            }
                        }
                    }
                }
                else {
                    $response = [
                        'code' => '14',
                        'status' => 'Error',
                        'description' => 'No Events found in the file! Please upload a valid file.'
                    ];
                    return json_encode($response);
                }
                
                if(!empty($data) && $data->count()){
                    foreach ($data as $value) {
                        if(!empty($value)) {
                            $event = new Event;
                            $event->name = $value['name'];
                            $event->commonName = $value['commonname'];
                            $event->description = $value['description'];
                            $event->location = $value['location'];
                            $event->qrCodeHash = $value['qrcodehash'];
                            $event->time = $value['time'];
                            $event->if_team = ($value['if_team'] == 'false') ? 0 : 1;
                            $event->members = $value['members'];
                            $event->organizer = $value['organizer'];
                            $event->mobile = $value['mobile'];
                            $event->photo = $value['photo'];
                            $event->rules = $value['rules'];
                            $event->save();
                        }
                    }
                }
            }
            $response = [
                'code' => '14',
                'status' => 'OK',
                'description' => 'Events imported Successfully.'
            ];
            return json_encode($response);
        } catch (\Exception $e) {
            $response = [
                'code' => '-34',
                'status' => 'Error',
                'description' => 'Some other error while importing details for events.',
                'e' => $e
            ];

            return json_encode($response);
        }
    }
}
