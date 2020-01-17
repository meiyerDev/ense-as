<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Curse};

class CurseController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function curseList()
  {
    $curses = Curse::all();
    return view('curses.list',compact('curses'));
  }

  public function curseAdd()
  {
    return view('curses.add');
  }

  public function curseCreate(Request $request)
  {
    $data = request()->validate([
      'grade'         =>  'required', 
      'section'       =>  'required', 
    ]);

    $curse = Curse::create([
      'grade'   => $request->grade,
      'section'   => $request->section
    ]); 

    return back()->with('success','Se ha Creado el Grado y la Sección con éxito.');
  }

  public function curseEdit($id)
  {
    $curse = Curse::find($id);

    return view('curses.edit',compact('curse'));
  }

  public function curseSendEdit(Request $request,$id)
  {
    $data = request()->validate([
      'grade'         =>  'required', 
      'section'       =>  'required', 
    ]);

    $curse = Curse::find($id)->update($request->all());

    return back();
  }

  // SOLICITUDES AJAX
  public function curseAll(Request $request)
  {
    if (!$request->ajax()) {
      return back();
    }
        
    $curse = Curse::select('id','grade','section')->get();
    
  	return $curse;	
  }
  // SOLICITUDES AJAX
}
