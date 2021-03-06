<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// test view Routes
Route::get('/test/testCollegeInputForm', 'TestPagesController@testCollegeInputForm');

//		UPLOADS
//	upload excel for colleges
Route::post('/upload/XLSX-File/college', 'CollegeController@xlsxFileParser')->name('uploadFile-xlsx-college');

//	upload excel for events
Route::post('/upload/XLSX-File/event', 'EventController@parseEventsxlsxFile')->name('uploadFile-xlsx-events');

//	upload excel for teams
Route::post('/upload/XLSX-File/teams', 'CollegeController@xlsxFileParserTeams')->name('uploadFile-xlsx-teams');

//	upload excel for eventheads
Route::post('/upload/XLSX-File/eventheads', 'EventheadController@xlsxFileParserEventheads')->name('uploadFile-xlsx-eventheads');

//	API test to add student record from TheCollegeFever
Route::get('/api/studentRecord/test/{name}/{college}/{email}/{mobile}/{ticket_id}/{place}/{amountPaid}', 'StudentController@registerStudentTest');

//	API for TheCollegeFever
Route::post('/api/studentRecord/input', 'StudentController@registerStudentTFC');

//=========================================================================================================================

//					LOOK FOR URLs FROM HERE 		method can be GET or POST, which is mentioned after Route::____


//										COLLEGE
//	Add New College
Route::post('/college/input/addNew', 'CollegeController@addNewCollege')->name('collegeInput');
//	Get All Colleges
Route::get('/college/all', 'CollegeController@getCollegeNames');


//										EVENT
//	New Event Create
Route::post('/event/input/addNew', 'EventController@createNewEvent');

//	All event details
Route::get('/event/all', 'EventController@allEventDetails');

//	All Students enrolled in a particular event 			PARAMS:	event_id	OPTIONAL: subEvent (required only for Gaming)
Route::get('/students/in/event/{event_id}/{subEvent?}/', 'EventController@studentsInThisEvent');

//	Update Event by Event Head or Admin 	
Route::post('/event/updateEvent', 'EventController@updateEvent');


//										EVENT HEAD
//	Add New Eventhead
Route::post('/eventHead/input/addNew', 'EventheadController@registerNewEventHead');

//	Log in Event Head 	PARAM: name(string), password(string)
Route::post('/eventHead/logIn', 'EventheadController@logInEventHead');

//	Log Out Event Head
// Route::post('/eventHead/logOut', 'EventheadController@logOutEventHead');


//										STUDENT
//	Add New Student 		PARAM: (college_id(int)) OR (college_name(string) AND college_place(string)), name(string), sex(boolean), mobile(string), isLocalite(boolean), email(string), password(string)
Route::post('/students/input/addNew', 'StudentController@createStudent');

//	Get a particular student details 	PARAM: 'student_id' as id(int)
Route::get('/students/get/{id}/details', 'StudentController@getStudentDetails');

//	Registeration Fee Paid 		PARAM: student_id as id(int)
Route::get('/students/input/{id}/updateRegist', 'StudentController@registerFeePaid');

//	Log in Student 		PARAM: 	email(string), password(string)
Route::post('/students/logIn', 'StudentController@logInStudent');

//	update registration hash QR flag to mark present(EventHead side of App) 	PARAM: student_id as id(int), registHash(string)
Route::get('/students/qrCodeHash/registration/{id}/{registHash}/update', 'StudentController@updateRegistHash');

//	update food day 1 hash QR flag to mark student present for food 	PARAM: student_id as id(int), foodHash1(string)
Route::get('/students/qrCodeHash/food1/{id}/{foodHash1}/update', 'StudentController@updateFood1Hash');

//	update food day 2 hash QR flag to mark student present for food 	PARAM: student_id as id(int), foodHash2(string)
Route::get('/students/qrCodeHash/food2/{id}/{foodHash2}/update', 'StudentController@updateFood2Hash');

//	Student Enrolling themself in event using website 	PARAM: student_id(int), event_id(int), game_id(int, if gaming event, then which game, 0:CS, 1:Blur, 2:Fifa), 
Route::post('/students/enrollment/self/website', 'StudentController@enrollStudent');

//	Student Enrolling themself using QR code 		PARAM: student_id(int), eventQrCodeHash(string, QR code that is scanned of the event), 
Route::post('/students/enrollment/self/scan', 'StudentController@studentEnrollSelf');

//	Student Enrolling by eventHead 		PARAM: studentQrHash(string, the registHash QR code of student in App/Screenshot), event_id(int, which event the eventHead is already in), game_id(int, if the event is Gaming, null otherwise)
Route::post('/students/enrollment/eventheads/scan', 'StudentController@studentEnrollHead');

//	Student un-enroll by self 		PARAM: student_id, event_id
Route::post('/students/enrollment/self/un-enroll', 'StudentController@unrollStudent');

//	Student show students events 	PARAM: student_id
Route::get('/student/enrollment/get/{id}/details', 'StudentController@showStudentEvents');

//	Show Schedule
Route::get('/show/schedule',function() {
	return view('schedule');
});


//---------------------------------------------------------------------------------------------------------------------------------------------------
//				DON'T TOUCH ANYTHING BELOW THIS
//---------------------------------------------------------------------------------------------------------------------------------------------------

Route::get('/', 'PageController@index')->name('index');
Route::get('/welcome', 'PageController@welcome')->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/verifyEmail/{email}', 'PageController@verifyEmail')->name('verifyEmail');
Route::get('/emailVerified/{email}/app', 'PageController@emailVerified')->name('emailVerified');
Route::get('verify/{email}/{verifyToken}', 'Auth\RegisterController@sendEmailDone')->name('sendEmailDone.user');
Route::get('verify/{email}/{verifyToken}/app', 'StudentController@sendEmailDoneApp')->name('sendEmailDoneApp.user');

Route::get('verifyEmailFirst/{email}/invalid','PageController@invalidToken')->name('invalidToken');
Route::get('verifyEmailFirst/{email}/invalid/app','PageController@invalidTokenApp')->name('invalidTokenApp');

Route::get('/students/takePayment/{id}/pay', 'Admin\PaymentController@takePayment')->name('student.take-payment');

Route::post('/students/enrollment/event', 'StudentController@enrollmentInEvent')->name('students-event-enrollment');



//---------------------------------------------------------------------------------------------------------------------------------------------------
//				DON'T TOUCH ANYTHING BELOW THIS
//---------------------------------------------------------------------------------------------------------------------------------------------------


//	ADMIN Routes
Route::group(['namespace' => 'Admin'], function() {
	Route::prefix('admin')->group(function() {
		Route::get('/', 'HomeController@index')->name('admin.home');

		//	Auth
		Route::get('login', 'Auth\LoginController@showLoginForm')->name('admin.login');
		Route::post('login', 'Auth\LoginController@login');
		Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
		Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('admin.register');
		Route::post('register', 'Auth\RegisterController@register');
		Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
		Route::post('password/reset', 'Auth\ResetPasswordController@reset');
		Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('admin.password.reset');
		Route::post('logout', 'Auth\LoginController@logout')->name('admin.logout');

		//	Student
		Route::get('/student/{id}/edit/', 'PaymentController@editStudentShow')->name('show.Student.editForm');
		Route::put('/student/{id}/edit/', 'PaymentController@editStudentUpdate')->name('show.Student.editForm-update');
		Route::delete('/student/{id}/delete/', 'PaymentController@editStudentDelete')->name('show.Student.editForm-delete');
		Route::delete('/student/event/enrollment/{id}/delete', 'PaymentController@unEnrollStudent')->name('unEnrollStudent-admin');
		Route::post('/student/event/enrollment/addNew', 'PaymentController@enrollStudent')->name('enrollStudent-admin');

		//	Event Head
		Route::get('/event/student/{student_id}/{event_id}/markPresent', 'HomeController@markPresent')->name('student.markPresent');

		//	Show Print Page
		Route::get('/event/printPage', 'HomeController@showPrintPage')->name('showPrintPage');

		//	Reports
		Route::get('/reports/', 'PaymentController@reports');
	});
});
