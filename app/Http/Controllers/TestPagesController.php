<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestPagesController extends Controller
{
    public function testCollegeInputForm()
    {
    	return view('testCollegeInputForm');
    }
}
