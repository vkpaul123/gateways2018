<?php

namespace App\Http\Controllers;

use App\College;
use App\Team;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


class CollegeController extends Controller
{
    public function addNewCollege(Request $request)
    {
    	$response = null;

    	try {
	    	$college = new College;
	    	$college->name = $request->name;
	    	$college->save();
	    	
	    	$response = [
	    		'code' => '1',
	    		'status' => 'OK',
	    		'description' => 'New College Added'
	    	];

	    	return json_encode($response);
    	} catch(\Exception $e) {
    		$response = [
	    		'code' => '-1',
	    		'status' => 'Error',
	    		'description' => 'Error in adding a new College',
	    		'e' => $e
	    	];

	    	return json_encode($response);
    	}

    }

    public function getCollegeNames()
    {
    	$response = null;

    	try {
    		$colleges = College::orderBy('name')->get();

    		$response = [
    			'code' => '14',
    			'status' => 'OK',
    			'description' => 'Colleges found',
    			'colleges' => [
    				'count' => $colleges->count(),
    				'details' => $colleges->toArray()
    			]
    		];

    		return json_encode($response);
    	} catch(\Exception $e) {
    		$response = [
	    		'code' => '-35',
	    		'status' => 'Error',
	    		'description' => 'Error in Fetching College Details',
	    		'e' => $e
	    	];

	    	return json_encode($response);
    	}
    }

    public function xlsxFileParser(Request $request)
    {
        $response = null;
        try {
            if($request->hasFile('import_file')) {
                $path = $request->file('import_file')->getRealPath();

                $data = Excel::load($path, function($reader) {})->get(['name']);

                if(!empty($data) && $data->count()){
                    foreach ($data->toArray() as $key => $value) {
                        if(!empty($value)){
                            foreach ($value as $v) {        
                                $insert[] = [
                                    'name' => $v
                                ];
                            }
                        }
                    }
                    
                    if(!empty($insert)){
                        College::insert($insert);

                        $response = [
                            'code' => '14',
                            'status' => 'OK',
                            'description' => 'College records imported successfully.'
                        ];
                        return json_encode($response);
                    }
                }
            }
            $response = [
                'code' => '14',
                'status' => 'Error',
                'description' => 'Please Check your file, Something is wrong there.'
            ];
            return json_encode($response);
        } catch (\Exception $e) {
            $response = [
                'code' => '-35',
                'status' => 'Error',
                'description' => 'Error in importing College Details',
                'e' => $e
            ];

            return json_encode($response);
        }
    }

    public function xlsxFileParserTeams(Request $request)
    {
        $response = null;
        try {
            if($request->hasFile('import_file_teams')) {
                $path = $request->file('import_file_teams')->getRealPath();

                $data = Excel::load($path, function($reader) {})->get(['name']);

                if(!empty($data) && $data->count()){
                    foreach ($data->toArray() as $key => $value) {
                        if(!empty($value)){
                            foreach ($value as $v) {        
                                $insert[] = [
                                    'name' => ucfirst($v)
                                ];
                            }
                        }
                    }
                    
                    if(!empty($insert)){
                        Team::insert($insert);

                        $response = [
                            'code' => '14',
                            'status' => 'OK',
                            'description' => 'Team records imported successfully.'
                        ];
                        return json_encode($response);
                    }
                }
            }
            $response = [
                'code' => '14',
                'status' => 'Error',
                'description' => 'Please Check your file, Something is wrong there.'
            ];
            return json_encode($response);
        } catch (\Exception $e) {
            $response = [
                'code' => '-35',
                'status' => 'Error',
                'description' => 'Error in importing Team Details',
                'e' => $e
            ];

            return json_encode($response);
        }
    }
}
