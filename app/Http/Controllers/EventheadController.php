<?php

namespace App\Http\Controllers;

use App\Event;
use App\Eventheads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EventheadController extends Controller
{
    public function registerNewEventHead(Request $request)
    {
    	$response = null;
    	try {
    		$eventHeads = Eventheads::all();

    		if($eventHeads->count() <= 50) {
    			$eventHeads = new Eventheads;
    			$eventHeads->name = $request->name;
    			$eventHeads->password = Hash::make($request->password);
    			$eventHeads->event_id = $request->event_id;
    			$eventHeads->save();
				
				$response = [
                    'code' => '4',
                    'status' => 'OK',
                    'description' => 'Registration successful',
                    'student_id' => $eventHead->id
                ];
                return json_encode($response);
    		} else {
    			$response = [
                    'code' => '-28',
                    'status' => 'Error',
                    'description' => 'Error in Registring. Student Already logged out.'
                ];
                return json_encode($response);
    		}

    	} catch(\Exception $e) {
    		$response = [
				'code' => '-6',
				'status' => 'Error',
				'description' => 'Some other error in Registration of Eventhead',
				'e' => $e
			];
			return json_encode($response);
    	}
    }

    public function logInEventHead(Request $request)
    {
    	$response = null;
    	try {
    		$eventHeadFound = false;
    		$eventHead = Eventheads::where('name', $request->name)->get()->first();

    		if($eventHead->count() != 0) {
    			if(Hash::check($request->password, $eventHead->password)) {
    				$response = [
                        'code' => '4',
                        'status' => 'OK',
                        'description' => 'Log in successful',
                        'student_id' => $eventHead->id
                    ];
                    return json_encode($response);
    			} else {
    				$response = [
	    				'code' => '-5',
	    				'status' => 'Error',
	    				'description' => 'Error in Log in. password does not match'
	    			];
	    			return json_encode($response);
    			}

    		} else {
    			$response = [
    				'code' => '-28',
    				'status' => 'Error',
    				'description' => 'Error in Log in. Eventhead Name does not exist.'
    			];
    			return json_encode($response);
    		}
    	} catch (\Exception $e) {
    		$response = [
				'code' => '-6',
				'status' => 'Error',
				'description' => 'Some other error in Logging in for Event Head',
				'e' => $e
			];
			return json_encode($response);
    	}
    }

    //  Might Not be required
    public function logOutEventHead(Request $request)
    {
    	$response = null;
    	try {
    		$eventHead = Eventheads::find($request->id);
    		$event = Event::find($eventHead->event_id);
    		$event->loginCount++;
    		$event->save();

    		$response = [
                'code' => '4',
                'status' => 'OK',
                'description' => 'Log out successful'
            ];
            return json_encode($response);
    	} catch (\Exception $e) {
    		$response = [
				'code' => '-6',
				'status' => 'Error',
				'description' => 'Some other error in Logging out for Event Head',
				'e' => $e
			];
			return json_encode($response);
    	}
    }
}
