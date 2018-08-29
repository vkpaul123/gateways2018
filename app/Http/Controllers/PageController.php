<?php

namespace App\Http\Controllers;

use App\College;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
    	// $colleges = College::orderBy('name')->get();
    	return view('preloader');
    }

    public function welcome()
    {
    	return view('index');
    }
}
