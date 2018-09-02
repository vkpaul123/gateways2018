<?php

namespace App\Http\Controllers\Auth;

use App\College;
use App\Http\Controllers\Controller;
use App\Mail\VerifyEmail;
use App\Student;
use App\Team;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'password' => 'required|string|min:6|confirmed',
            'name' => 'required',
            'mobile' => 'required|numeric',
            'email' => 'required|email',
            'Blr_clg' => 'required',
            'sex' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        // $student = Student::where('email', $data['email'])->get()->first();
    
        // $student->isLocalite = $data['Blr_clg'];
        // $student->password = bcrypt($data['password']);
        // $student->registHash = Hash::make($student->email);

        // $teamExist = Student::where('college_id', $student->college_id)->get()->first();
        // if(isset($teamExist)) {
        //     $student->team = $teamExist->team;
        // } else {
        //     $team = Team::first();
        //     $student->team = $team->name;
        //     Team::where('name', $team->name)->delete();
        // }

        // $student->save();

        // return $student;
        
        $student = new Student;
        $student->name = $data['name'];
        $student->mobile = $data['mobile'];
        $student->sex = $data['sex'];
        $student->email = $data['email'];
        $student->password = bcrypt($data['password']);
        $student->registHash = Hash::make($student->email);

        if(!isset($data['college_id'])) {
            $college = new College;
            $college->name = $data['college_name'] . ', ' . $data['college_place'];
            $college->save();

            $student->college_id = College::where('name', $college->name)->get()->first()->id;

            $student->team = Team::first()->name;
            Team::where('name', $student->team)->delete();
        } else {
            $student->college_id = $data['college_id'];
            $teamExist = Student::where('college_id', $student->college_id)->get()->first();
            if(isset($teamExist)) {
                $student->team = $teamExist->team;
            } else {
                $student->team = Team::first()->name;
                Team::where('name', $student->team)->delete();
            }
        }

        $student->verifyToken = Str::random(40);

        $student->save();

        $thisUser = Student::findOrFail($student->id);

        $this->sendEmail($thisUser);

        return $student;

        // return Student::create([
        //     'name' => $data['name'],
        //     'email' => $data['email'],
        //     'mobile' => $data['mobile'],
        //     'isLocalite' => $data['Blr_clg'],
        //     'sex' => $data['sex'],
        //     'password' => bcrypt($data['password']),
        // ]);
    }

    public function sendEmail($thisUser)
    {
        Mail::to($thisUser['email'])->send(new VerifyEmail($thisUser));
    }

    public function sendEmailDone($email, $verifyToken)
    {
        $student = Student::where(['email' => $email, 'verifyToken' => $verifyToken])->get()->first();
        if(isset($student)) {
            Student::where(['email' => $email, 'verifyToken' => $verifyToken])
            ->update(['status' => '1', 'verifyToken' => NULL]);
            Session::flash('message', 'Account Activated Successfully!');
            // return redirect(route('login'));
            $this->guard()->login($student);
        }
        else {
            return redirect(route('invalidToken', $email));
        }
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }
}
