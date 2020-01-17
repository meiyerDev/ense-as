<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Teacher,User,Curse};
use Carbon\Carbon;

class TeacherController extends Controller
{

	public function __construct()
  {
    $this->middleware('auth');
  }

  public function teacherList()
  {
    $teachers = Teacher::all();
    // dd($teacher);
  	return view('teachers.list',compact('teachers'));
  }

  public function teacherAdd()
  {
  	return view('teachers.add');
  }

  // METHOD FOR CREATE A TEACHER
  public function teacherCreate(Request $request)
  {
  	$data = request()->validate([
      'firstname'         =>  'required|min:3|max:20|string', 
			'identity'        	=>  'required|min:6|max:9|string', 
			'gender'            =>  'required', 
			'finish'		        =>  'required|date_format:"d-m-Y"|after:31-12-1920', 
			'email'             =>  'required|email|unique:users,email', 
			'mobileno'          =>  'required|min:10|max:11', 
			'address'           =>  'required|min:5', 
			'imageico'			    =>	'nullable',
			'curse_id'					=>	'required',
			'password'					=> 	'required|min:4',
			'confarmpassword'		=> 	'required|min:4',
		]);

    if ($data['password'] !== $data['confarmpassword']) {
      return back();
    }

    // ID OF CURSE
    $curse = Curse::find($data['curse_id']);

    // CREATE USER
    $user = User::create([
      'name'              =>  $data['firstname'],
      'email'             =>  $data['email'], 
      'type'             =>  'profesor', 
      'password'          =>  bcrypt($data['password']),
    ]);

    // CREATE TEACHER
    $teacher = Teacher::create([
      'firstname'         =>  $data['firstname'], 
      'identity'         =>  $data['identity'], 
      'gender'            =>  $data['gender'], 
      'finish'            =>  new Carbon($data['finish']), 
      'email'             =>  $data['email'], 
      'mobileno'          =>  $data['mobileno'], 
      'address'           =>  $data['address'], 
      'imageico'          =>  $data['imageico'],
      'curse_id'          =>  $curse->id,
      'user_id'           =>  $user->id,
    ]);

    return back()
      ->with('success','Se ha Creado el(la) Profesor(a) con éxito.');
  }

  // METHOD FOR VIEW TEACHER
  public function teacherView($id)
  {
    $curses = Curse::all();
    $teacher = Teacher::where('identity',$id)->first();
    // return $teacher->identity;
    return view('teachers.teacher',compact('teacher','curses'));
  }

  // METHOD FOR EDIT TEACHER
  public function teacherSendEdit(Request $request, $id)
  {
    $data = request()->validate([
      'firstname'         =>  'required|min:3|max:50|string', 
      'identity'          =>  'required|min:6|max:9|string', 
      'mobileno'          =>  'required|min:10|max:11', 
      'address'           =>  'required|min:5', 
      'curse_id'          =>  'required',
    ]);

    $teacher = Teacher::find($id)->update($request->all());

    return back();
  }

}
