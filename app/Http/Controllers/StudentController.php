<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Student,Curse};
use Carbon\Carbon;

class StudentController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function studentList()
  {
    if (\Auth::user()->type == 'profesor') {
      $curse = Curse::find(\Auth::user()->teacher->curse_id);
      if (!empty($curse)) {
        $students = $curse->students;
      }else{
        $students = [];
      }
    }else{
      $students = Student::all();
    }

  	return view('students.list',compact('students'));
  }

  public function studentAdd()
  {
		$curses = Curse::all();  	

  	return view('students.add',compact('curses'));
  }

  // METHOD FOR CREATE A STUDENT
  public function studentCreate(Request $request)
  {
  	$data = request()->validate([
      'firstname'         =>  'required|min:3|max:20|string', 
      'lastname'          =>  'required|min:3|max:20|string', 
			'identity'        	=>  'required|min:6|max:9|string', 
			'gender'            =>  'required', 
			'finish'		        =>  'required|date_format:"d-m-Y"|after:31-12-1920', 
			'representant' 		  =>  'required', 
			'mobileno'          =>  'required|min:10|max:11', 
			'address'           =>  'required|min:5', 
		]);

    // ID OF CURSE
    if (\Auth::user()->type == 'profesor') {

      $curse = Curse::find(\Auth::user()->teacher->curse_id);
    
    }elseif(!empty($data['curse_id'])){
    
      $curse = Curse::find($data['curse_id']);
    
    }else{
      return back();
    }

    // CREATE TEACHER
    $student = Student::create([
      'firstname'         =>  $data['firstname'], 
      'lastname'          =>  $data['lastname'], 
      'identity'          =>  $data['identity'], 
      'gender'            =>  $data['gender'], 
      'finish'            =>  new Carbon($data['finish']), 
      'representant'      =>  $data['representant'], 
      'mobileno'          =>  $data['mobileno'], 
      'address'           =>  $data['address'], 
      'curse_id'          =>  $curse->id,
    ]);

    return back()
      ->with('success','Se ha Creado el(la) Profesor(a) con éxito.');
  }

  // METHOD FOR VIEW student
  public function studentView($id)
  {
    $curses = Curse::all();
    $student = Student::find($id);
    // return $student->identity;
    return view('students.student',compact('student','curses'));
  }

  // METHOD FOR EDIT student
  public function studentSendEdit(Request $request, $id)
  {

    $data = request()->validate([
      'firstname'         =>  'required|min:3|max:20|string', 
      'lastname'          =>  'required|min:3|max:20|string', 
      'identity'          =>  'required|min:6|max:9|string', 
      'mobileno'          =>  'required|min:10|max:11', 
      'address'           =>  'required|min:5', 
      'curse_id'          =>  'required',
    ]);

    $student = Student::find($id)->update($request->all());

    return back();
  }
}
