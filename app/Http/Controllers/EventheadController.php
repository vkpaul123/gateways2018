<?php

namespace App\Http\Controllers;

use App\Event;
use App\Eventheads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

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

    public function xlsxFileParserEventheads(Request $request)
    {
        $response = null;
        try {
            if($request->hasFile('import_file_eventheads')) {
                $path = $request->file('import_file_eventheads')->getRealPath();

                $data = Excel::load($path, function($reader) {})->get([
                    'name',
                    'email',
                    'password',
                    'eventid',
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
                            $event = new Eventheads;
                            $event->name = $value['name'];
                            $event->email = $value['email'];
                            $event->password = Hash::make($value['password']);
                            $event->event_id = $value['eventid'];
                            $event->save();
                        }
                    }
                }
                $response = [
                    'code' => '14',
                    'status' => 'OK',
                    'description' => 'Eventheads imported Successfully.'
                ];
                return json_encode($response);
            } else {
                return 'error';
            }
        } catch (\Exception $e) {
            $response = [
                'code' => '-34',
                'status' => 'Error',
                'description' => 'Some other error while importing details for eventheads.',
                'e' => $e
            ];

            return json_encode($response);
        }
    }
}
