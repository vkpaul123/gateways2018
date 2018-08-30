<?php

namespace App\Http\Controllers;

use App\College;
use App\Student;
use App\StudentEvents;
use App\Team;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{
	//	CREATE A NEW STUDENT
    public function createStudent(Request $request) {
    	$response = null;
    	try {
            $payload = json_decode($request->getContent(), true);
    		$studentCountInCollege = Student::where('college_id', $payload['college_id'])->get()->count();

    		if($studentCountInCollege < 15) {
                $student = new Student;

                $student->college_id = $payload['college_id'];

                $student->name = $payload['name'];                
                $student->roll = $payload['roll'];                
                $student->mobile = $payload['mobile'];
                $student->isLocalite = ($payload['isLocalite'] == 'true') ? 1 : 0;            
                
                $student->email = $payload['email'];              
                $student->password = Hash::make($payload['password']);

                $student->registHash = Hash::make($student->email);

    			// return $student;
				$student->save();

                $student_curr = Student::where('email', $payload['email'])->get()->first();
    			
				$response = [
					'code' => '2',
					'status' => 'OK',
					'description' => 'Successfully added a new Student',
                    'student_id' => $student_curr->id,
                    'qrCodeHash' => $student_curr->registHash
				];

				return json_encode($response);
    		} else {
    			$response = [
    				'code' => '-3',
    				'status' => 'Error',
    				'description' => 'Error in adding a new Student. College Participation Limit 15 reached'
    			];

    			return json_encode($response);
    		}
    	} catch (\Exception $e) {
    		$response = [
    			'code' => '-2',
    			'status' => 'Error',
    			'description' => 'Error in adding a new Student. Already exists',
    			'e' => $e,
                'payload' => $payload,
                'student' => $student
    		];

    		return json_encode($response);
    	}
    }

    public function registerStudentTFC(Request $request)
    {
        // try {
            $payload = json_decode(utf8_encode($request->getContent()), true);

            foreach ($payload['ticketItems'] as $ticketItem) {
                $student = new Student;

                $student->name = $ticketItem['attendee']['name'];
                $student->college = $ticketItem['attendee']['college'];
                $student->email = $ticketItem['attendee']['email'];
                $student->mobile = $ticketItem['attendee']['phone'];
                $student->sex = $ticketItem['attendee']['sex'];
                $student->place = $ticketItem['attendee']['extraInfoValue'];
                $student->amountPaid = $ticketItem['fare'] . ' + ' . $ticketItem['serviceCharge'];

                $student->save();
                // return 'dizugnvsiugjvnfiujvnf ciugjvfnc igvjmfn gvjfgnvofjlgvn fjglvnfcgvnfcgjvnfcgvfcngv';
            }
            return Response::json([
                'status' => 'OK',
                'description' => 'Record(s) Created'
            ], 201);

        // } catch (\Exception $e) {
        //     return Response::json([
        //         'status' => 'Error',
        //         'description' => 'Some other Error in putting a Student',
        //         'errorDetails' => $e
        //     ], 203);
        // } 
    }

    // public function registerStudentTFC(Request $request)
    // {
    //     try {
    //         // return 2;
    //         $payload = json_decode($request->getContent(), true);

    //         $student = new Student;
    //         $student->name = $payload['studentName'];
    //         $student->email = $payload['email'];
    //         $student->mobile = $payload['mobile'];
    //         $student->college = $payload['collegeName'];
    //         $student->place = $payload['place'];
    //         $student->ticket_id = $payload['ticket_id'];
    //         $student->amountPaid = $payload['amountPaid'];

    //         // $collegeExist = Student::where('college', $payload['collegeName'])->get()->first();
    //         // if(isset($collegeExist)) {
    //         //     $student->team = $collegeExist->team;
    //         // } else {
    //         //     $team = Team::first();
    //         //     $student->team = $team->name;
    //         //     Team::where('name', $team->name)->delete();
    //         // }

    //         $student->save();

    //         return Response::json([
    //             'status' => 'Created'
    //         ], 201);
    //     } catch (\Exception $e) {
    //         return Response::json([
    //             'status' => 'Error',
    //             'description' => 'Some other Error in putting a Student',
    //             'errorDetails' => $e
    //         ], 203);
    //     } 
    // }

    // public function registerStudentFinal(Request $request)
    // {
    //     $student = Student::where('ticket_id', $request->ticket_id)->get()->first();
    //     if(isset($student)) {
    //         $student->password = Hash::make($request->password);
    //         $student->save();

    //     } else {
    //         Session::flash('messageError', 'The <strong>Ticket ID</strong> that you entered was not Found. Please make sure you have bought the ticket and are using a valid <strong>Ticket ID</strong> to register.');
    //         return redirect()->back();
    //     }
    // }

    public function getStudentDetails($id)
    {
        $response = null;
        try {
            $student = Student::find($id);
            if(isset($student)) {
                $response = [
                    'code' => '2',
                    'status' => 'OK',
                    'description' => 'Successfully found Student',
                    'student' => $student
                ];
                return json_encode($response);
            } else {
                $response = [
                    'code' => '-3',
                    'status' => 'Error',
                    'description' => 'Student Not Found! Invalid ID.'
                ];
                return json_encode($response);
            }
        } catch (\Exception $e) {
            $response = [
                'code' => '-2',
                'status' => 'Error',
                'description' => 'Some other Error in getting a Student',
                'e' => $e
            ];

            return json_encode($response);
        }
    }

    //	GENERATE HASHES FOR QR CODES
    public function registerFeePaid($id) {
    	$response = null;

    	try {
    		$student = Student::find($id);

    		$student->fee = true;
    		// $student->foodHash1 = Hash::make($student->email().substr($student->mobile, 0, 4));
    		// $student->foodHash2 = Hash::make($student->email().substr($student->mobile, 5, 9));

    		$response = [
    			'code' => '3',
    			'status' => 'OK',
    			'description' => 'Registeration Fee Acknowledgement Successful. QR Code Hashes for 2 Foods, 1 student generated'
    		];
    		return json_encode($response);

    	} catch(\Exception $e) {
    		$response = [
    			'code' => '-4',
    			'status' => 'Error',
    			'description' => 'Error in Registration Fee Acknowledgement. QR Code Hash Failed',
    			'e' => $e
    		];

    		return json_encode($response);
    	}
    }

    //	LOG IN STUDENT
    public function logInStudent(Request $request)
    {
    	$response = null;
    	try {
    		$studentFound = false;
    		$student = Student::where('email', $request->email)->get()->first();

    		if(isset($student)) {
	    		if(Hash::check($request->password, $student->password)) {
                    $response = [
                        'code' => '4',
                        'status' => 'OK',
                        'description' => 'Log in successful',
                        'student_id' => $student->id
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
    				'description' => 'Error in Log in. Email does not exist.'
    			];
    			return json_encode($response);
    		}
    	} catch(\Exception $e) {
    		$response = [
				'code' => '-6',
				'status' => 'Error',
				'description' => 'Some other error in Logging in',
				'e' => $e
			];
			return json_encode($response);
    	}
    }

    //  MIGHT NOT NEEDED
    public function logOutStudent(Request $request)
    {
        $response = null;
        try {
            $student = Student::find($request->id);
            if(isset($student)) {
                if($student->loginFlag == true) {
                    $student->loginFlag = false;
                    $student->save();
                    
                    $response = [
                        'code' => '-28',
                        'status' => 'OK',
                        'description' => 'Log Out Successful.'
                    ];
                    return json_encode($response);
                } else {
                    $response = [
                        'code' => '-28',
                        'status' => 'Error',
                        'description' => 'Error in Log Out. Student Already logged out.'
                    ];
                    return json_encode($response);
                }
            } else {
                $response = [
                    'code' => '-28',
                    'status' => 'Error',
                    'description' => 'Error in Log Out. Student does not exist.'
                ];
                return json_encode($response);
            }
        } catch (\Exception $e) {
            $response = [
                'code' => '-6',
                'status' => 'Error',
                'description' => 'Some other error in Logging out.',
                'e' => $e
            ];
            return json_encode($response);
        }
    }

    //	CHECK FOR REGISTRATION HASH FOR QR CODE
    public function updateRegistHash($id, $registHash)
    {
    	$response = null;
    	$student = Student::find($id);
    	try {
    		if(isset($student)) {
    			if($student->fee) {
    				if($student->registHash == $registHash) {
    					$student->attend = true;
    					$student->save();
	    				
	    				$response = [
	    					'code' => '5',
	    					'status' => 'OK',
	    					'description' => 'Registration Check Complete! Student Present for Fest'
	    				];
	    				return json_encode($response);
    				} else {
    					$response = [
	    					'code' => '-7',
	    					'status' => 'Error',
	    					'description' => 'Registration Check Failed! Registration QR Code Does not match.'
	    				];
	    				return json_encode($response);
    				}
    			} else {
    				$response = [
	    				'code' => '-8',
	    				'status' => 'Error',
	    				'description' => 'Student Did not Pay Fees. Cannot do Registration Hash Check!'
	    			];
	    			return json_encode($response);
    			}
    		} else {
    			$response = [
    				'code' => '-9',
    				'status' => 'Error',
    				'description' => 'Student Not Found during Registration Hash Check!'
    			];
    			return json_encode($response);
    		}
    	} catch (\Exception $e) {
    		$response = [
    			'code' => '-10',
    			'status' => 'Error',
    			'description' => 'Some other error during Registration Hash Check!',
    			'e' => $e
    		];
    		return json_encode($response);
    	}
    }

    //	CHECK FOR FOOD DAY 1 HASH FOR QR CODE 
    public function updateFood1Hash($id, $foodHash1)
    {
    	$response = null;
    	$student = Student::find($id);
    	try {
    		if(isset($student)) {
    			if($student->fee) {
    				if($student->foodHash1 == $foodHash1) {
    					if($student->foodHash1Attend == false) {
	    					$student->foodHash1Attend = true;
	    					$student->save();
		    				
		    				$response = [
		    					'code' => '6',
		    					'status' => 'OK',
		    					'description' => 'Food Day 1 Check Complete! Student Present to take Food on Day 1.'
		    				];
		    				return json_encode($response);
    					} else {
    						$response = [
		    					'code' => '-11',
		    					'status' => 'Error',
		    					'description' => 'Food Day 1 Check Already Complete! Student has taken Food on Day 1.'
		    				];
		    				return json_encode($response);
    					}
    				} else {
    					$response = [
	    					'code' => '-12',
	    					'status' => 'Error',
	    					'description' => 'Food Day 1 Check Failed! Food Day 1 QR Code Does not match.'
	    				];
	    				return json_encode($response);
    				}
    			} else {
    				$response = [
	    				'code' => '-13',
	    				'status' => 'Error',
	    				'description' => 'Student Did not Pay Fees. Cannot do Food Day 1 Hash Check!'
	    			];
	    			return json_encode($response);
    			}
    		} else {
    			$response = [
    				'code' => '-14',
    				'status' => 'Error',
    				'description' => 'Student Not Found during Food Day 1 Hash Check!'
    			];
    			return json_encode($response);
    		}
    	} catch (\Exception $e) {
    		$response = [
    			'code' => '-15',
    			'status' => 'Error',
    			'description' => 'Some other error during Food Day 1 Hash Check!',
    			'e' => $e
    		];
    		return json_encode($response);
    	}
    }

    //	CHECK FOR FOOD DAY 2 HASH FOR QR CODE 
    public function updateFood2Hash($id, $foodHash2)
    {
    	$response = null;
    	$student = Student::find($id);
    	try {
    		if(isset($student)) {
    			if($student->fee) {
    				if($student->foodHash2 == $foodHash2) {
    					if($student->foodHash2Attend == false) {
	    					$student->foodHash2Attend = true;
	    					$student->save();
		    				
		    				$response = [
		    					'code' => '7',
		    					'status' => 'OK',
		    					'description' => 'Food Day 2 Check Complete! Student Present to take Food on Day 2.'
		    				];
		    				return json_encode($response);
    					} else {
    						$response = [
		    					'code' => '-16',
		    					'status' => 'Error',
		    					'description' => 'Food Day 2 Check Already Complete! Student has taken Food on Day 2.'
		    				];
		    				return json_encode($response);
    					}
    				} else {
    					$response = [
	    					'code' => '-17',
	    					'status' => 'Error',
	    					'description' => 'Food Day 2 Check Failed! Food Day 2 QR Code Does not match.'
	    				];
	    				return json_encode($response);
    				}
    			} else {
    				$response = [
	    				'code' => '-18',
	    				'status' => 'Error',
	    				'description' => 'Student Did not Pay Fees. Cannot do Food Day 2 Hash Check!'
	    			];
	    			return json_encode($response);
    			}
    		} else {
    			$response = [
    				'code' => '-19',
    				'status' => 'Error',
    				'description' => 'Student Not Found during Food Day 2 Hash Check!'
    			];
    			return json_encode($response);
    		}
    	} catch (\Exception $e) {
    		$response = [
    			'code' => '-20',
    			'status' => 'Error',
    			'description' => 'Some other error during Food Day 2 Hash Check!',
    			'e' => $e
    		];
    		return json_encode($response);
    	}
    }

    public function studentEnrollSelf(Request $request)
    {
    	$response = null;

    	try {
	    	$student = Student::find($request->student_id);
    		if(isset($student)) {
    			$events = Event::all();

    			$checkGaming = false;
    			$gaming = [
    				env('GAME_QRHASH_CS'),
    				env('GAME_QRHASH_BLUR'),
    				env('GAME_QRHASH_FIFA')
    			];
    			
    			$event_id = 0;
    			$eventFound = false;

    			foreach ($events as $event) {
    				if($event->qrCodeHash == $request->eventQrCodeHash) {
    					$eventFound = true;
    					$event_id = $event->id;
    					break;
    				}
    			}

    			$game_id = 0;
    			$i=0;
    			foreach ($gaming as $game) {
    				if($game == $request->eventQrCodeHash) {
    					$eventFound = true;
    					$checkGaming = true;
    					$event_id = env('GAMING_EVENT_ID');
    					$game_id = $i;
    					break;
    				}
    				$i++;
    			}

    			if($eventFound == true) {
    				$checkAlreadyRegistered = StudentEvents::where('student_id', $student->id)
    															->where('event_id', $event_id)
    															->get();

    				if($checkAlreadyRegistered->count() != 0) {
    					if($checkAlreadyRegistered->enrollStatus == false) {
    						$checkAlreadyRegistered->enrollStatus = true;
    						$checkAlreadyRegistered->save();

    						$response = [
				    			'code' => '11',
				    			'status' => 'OK',
				    			'description' => 'Self Registration Successful in Event! enrollment Updated.'
				    		];
				    		return json_encode($response);
    					} else {
    						$response = [
				    			'code' => '-27',
				    			'status' => 'Error',
				    			'description' => 'Student Already Registered in this event in enrollment!'
				    		];
				    		return json_encode($response);
    					}
    				} else {
		    			$enroll = new StudentEvents;
		    			$enroll->student_id = $request->student_id;
		    			$enroll->event_id = $event_id;
		    			$enroll->attend = true;
		    			$enroll->enrollStatus = true;
		    			if($checkGaming == true) {
		    				switch ($game_id) {
		    					case 0:
		    						$enroll->subEvent = 'CS';
		    						break;
		    					
		    					case 1:
		    						$enroll->subEvent = 'Blur';
		    						break;

		    					case 2:
		    						$enroll->subEvent = 'Fifa';
		    						break;
		    				}
		    			}
		    			$enroll->save();
		    			$response = [
			    			'code' => '10',
			    			'status' => 'OK',
			    			'description' => 'Self Registration Successful in Event!'
			    		];
			    		return json_encode($response);		
    				}
    			} else {
	    			$response = [
		    			'code' => '-26',
		    			'status' => 'Error',
		    			'description' => 'Invalid QR code for self enrollment!'
		    		];
		    		return json_encode($response);
    			}

    		} else {
    			$response = [
	    			'code' => '-25',
	    			'status' => 'Error',
	    			'description' => 'Student Not Found for self enrollment!'
	    		];
	    		return json_encode($response);
    		}
    	} catch (\Exception $e) {
    		$response = [
    			'code' => '-24',
    			'status' => 'Error',
    			'description' => 'Some other error in student self enrollment for event!',
    			'e' => $e
    		];
    		return json_encode($response);
    	}
    }

    //  REGISTRATION DONE BY EVENT HEADS
    public function studentEnrollHead(Request $request)
    {
    	$response = null;

    	try {
    		$currStudent = Student::where('registHash', $request->studentQrHash)->get();

			if(isset($currStudent)) {
				$checkGaming = false;
				if($request->event_id == env('GAMING_EVENT_ID'))
					$checkGaming = true;

				$enrollmentCheck = StudentEvents::where('student_id', $currStudent->id)
													->where('event_id', $request->event_id)
													->get()->first();
				if($enrollmentCheck->count() != 0) {
					if($enrollmentCheck->enrollStatus == false) {
						$enrollmentCheck->enrollStatus = true;
						$enrollmentCheck->save();

						$response = [
			    			'code' => '11',
			    			'status' => 'OK',
			    			'description' => 'Head Registration Successful in Event! enrollment Updated.'
			    		];
			    		return json_encode($response);
					} else {
                        $response = [
                            'code' => '-27',
                            'status' => 'Error',
                            'description' => 'Student Already Registered in this event in enrollment!'
                        ];
                        return json_encode($response);
                    }
				} else {
					$enroll = new StudentEvents;
					$enroll->student_id = $currStudent->id;
					$enroll->event_id = $request->event_id;
					$enroll->attend = true;
					$enroll->enrollStatus = true;
					if($checkGaming == true) {
						$game_id = $request->game_id;
	    				switch ($game_id) {
	    					case 0:
	    						$enroll->subEvent = 'CS';
	    						break;
	    					
	    					case 1:
	    						$enroll->subEvent = 'Blur';
	    						break;

	    					case 2:
	    						$enroll->subEvent = 'Fifa';
	    						break;
	    				}
	    			}
	    			$enroll->save();
	    			$response = [
		    			'code' => '10',
		    			'status' => 'OK',
		    			'description' => 'Head Registration Successful in Event!'
		    		];
		    		return json_encode($response);	
				}
			}
			else {
    			$response = [
	    			'code' => '-29',
	    			'status' => 'Error',
	    			'description' => 'Student QR Hash did not match for enrollment by head for event!'
	    		];
	    		return json_encode($response);
			}
    	} catch (\Exception $e) {
    		$response = [
    			'code' => '-28',
    			'status' => 'Error',
    			'description' => 'Some other error in student enrollment by head for event!',
    			'e' => $e
    		];
    		return json_encode($response);
    	}
    }

    public function enrollStudent(Request $request)
    {
        $response = null;

        try {
            $enroll = StudentEvents::where('student_id', $request->student_id)
                                            ->where('event_id', $request->event_id)
                                            ->get()->first();

            if(isset($enroll)) {
                if($enroll->enrollStatus == false) {
                    $enroll->enrollStatus == true;

                    if($request->event_id == env('GAMING_EVENT_ID')) {
                        $game_id = $request->game_id;
                        switch ($game_id) {
                            case 0:
                                $enroll->subEvent = 'CS';
                                break;
                            
                            case 1:
                                $enroll->subEvent = 'Blur';
                                break;

                            case 2:
                                $enroll->subEvent = 'Fifa';
                                break;
                        }
                    }
                    $enroll->save();
                    $response = [
                        'code' => '10',
                        'status' => 'OK',
                        'description' => 'Head Registration Update Successful in Event!'
                    ];
                    return json_encode($response);

                } else {
                    $response = [
                        'code' => '-32',
                        'status' => 'Error',
                        'description' => 'Student cannot enroll for the event. Already enrolled!'
                    ];
                    return json_encode($response);
                }
            } else {
                $enroll = new StudentEvents;
                $enroll->student_id = $request->student_id;
                $enroll->event_id = $request->event_id;
                $enroll->attend = true;
                $enroll->enrollStatus = true;
                if($request->event_id == env('GAMING_EVENT_ID')) {
                    $game_id = $request->game_id;
                    switch ($game_id) {
                        case 0:
                            $enroll->subEvent = 'CS';
                            break;
                        
                        case 1:
                            $enroll->subEvent = 'Blur';
                            break;

                        case 2:
                            $enroll->subEvent = 'Fifa';
                            break;
                    }
                }
                $enroll->save();
                $response = [
                    'code' => '10',
                    'status' => 'OK',
                    'description' => 'Head New Registration Successful in Event!'
                ];
                return json_encode($response);
            }
        } catch (\Exception $e) {
            $response = [
                'code' => '-28',
                'status' => 'Error',
                'description' => 'Some other error in student un-enrollment by website for event!',
                'e' => $e
            ];
            return json_encode($response);
        }
    }

    public function unrollStudent(Request $request)
    {
    	$response = null;

    	try {
	    	$enrollment = StudentEvents::where('student_id', $request->student_id)
	    									->where('event_id', $request->event_id)
	    									->get()->first();

	    	if($enrollment->count() != 0) {
	    		if($enrollment->enrollStatus == true) {
                    if(env('ALLOW_UN_ENROLL') == true) {
    	    			$enrollment->enrollStatus = false;
    	    			$enrollment->save();

    	    			$response = [
    		    			'code' => '12',
    		    			'status' => 'OK',
    		    			'description' => 'Student un-enrolled from the event!'
    		    		];
    		    		return json_encode($response);
                    } else {
                        $response = [
                            'code' => '-32',
                            'status' => 'Error',
                            'description' => 'Student cannot un-enroll from the event. Events have Already started!'
                        ];
                        return json_encode($response);
                    }
	    		} else {
	    			$response = [
		    			'code' => '-32',
		    			'status' => 'Error',
		    			'description' => 'Student Already un-enrolled from the event!'
		    		];
		    		return json_encode($response);
	    		}
	    	} else {
	    		$response = [
	    			'code' => '-31',
	    			'status' => 'Error',
	    			'description' => 'Student enrollment not found for un-enrollment!'
	    		];
	    		return json_encode($response);
	    	}
    		
    	} catch (\Exception $e) {
    		$response = [
    			'code' => '-30',
    			'status' => 'Error',
    			'description' => 'Some other error in student un-enrollment by self for event!',
    			'e' => $e
    		];
    		return json_encode($response);
    	}
    }

    public function showStudentEvents($id)
    {
        $response = null;
        try {
            $enrollments = StudentEvents::where('student_id', $id)->where('enrollStatus', true)->get();

            if($events->count() != 0) {
                $response = [
                    'code' => '-31',
                    'status' => 'OK',
                    'description' => 'Student enrollments',
                    '$enrollments' => $enrollments->toArray()
                ];
                return json_encode($response);
            } else {
                $response = [
                    'code' => '-31',
                    'status' => 'Error',
                    'description' => 'Student has not enrolled in any events!'
                ];
                return json_encode($response);
            }
        } catch (\Exception $e) {
            $response = [
                'code' => '-30',
                'status' => 'Error',
                'description' => 'Some other error in student enrollment fetching!',
                'e' => $e
            ];
            return json_encode($response);
        } 
    }
}
