<?php

namespace App\Http\Controllers;

use App\College;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
    	return view('preloader');
    }

    public function welcome()
    {
    	$colleges = College::orderBy('name')->get();
    	return view('index')
    	->with(compact('colleges'));
    }
}
