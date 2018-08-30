<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestPagesController extends Controller
{
    public function testCollegeInputForm()
    {
    	$myJsonDecoded = json_decode('{ "ticketItems":[ { "programName":"Atharv \'18", "subProgramName":"Free Ticket", "fare":0.00, "attendee":{ "name":"Sikandar Yadav", "email":"sikandar152@gmail.com", "phone":"9788928317", "college":"TheCollegeFever", "sex":"MALE", "initials":"SY", "extraInfoValue":"BENGALURU" }, "serviceCharge":0.00 }, { "programName":"Atharv \'18", "subProgramName":"Free Ticket", "fare":0.00, "attendee":{ "name":"Vishal", "email":"sikandar152@gmail.com", "phone":"9788928317", "college":"TheCollegeFever", "sex":"MALE", "initials":"V", "extraInfoValue":"BENGALURU" }, "serviceCharge":0.00 }, { "programName":"Atharv \'18", "subProgramName":"Free Ticket", "fare":0.00, "attendee":{ "name":"Kushal", "email":"sikandar152@gmail.com", "phone":"9788928317", "college":"TheCollegeFever", "sex":"MALE", "initials":"K", "extraInfoValue":"BENGALURU" }, "serviceCharge":0.00 } ] }', true);

    	// return $myJsonDecoded['ticketItems'];

    	foreach ($myJsonDecoded['ticketItems'] as $ticketItem) {
    		
    		echo ($ticketItem['attendee']['email']);
    		echo "<br>";
    	}

    	echo count($myJsonDecoded['ticketItems']);

    	return view('testCollegeInputForm');
    }
}
