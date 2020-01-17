<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Module,Used,Option};
class ModuleController extends Controller
{
  public function apiAll($id)
  {
    $modules = Module::all();

    $modulos = [];

    foreach ($modules as $modulo) {
      $scores = $modulo->students()->where('student_id',$id)->first();
      if(is_null($scores)){
        $modulos[] = [
          'id' => $modulo->id,
          'name' => $modulo->name,
          'link' => $modulo->link,
          'max_options' => $modulo->max_options,
          'score' => 0
        ];
      }else{
        $modulos[] = [
          'id' => $modulo->id,
          'name' => $modulo->name,
          'link' => $modulo->link,
          'max_options' => $modulo->max_options,
          'score' => $scores->pivot->score
        ];
      }
    }

    return response()->json($modulos,200);
  }

  public function apiOption($idModule)
  {
    $module = Module::findOrFail($idModule);

    $options = [];
    $options_final = [];

    $used = Used::where('module_id',$idModule)
            ->where('student_id',1);
            // ->where('student_id',$idStudent)
    $numberUsed = count($used->get());

    $i = 0;
    $correcta=null;
    do {
      $numberRandom = random_int(1,$module->max_options);
      
      if ($i < 1 && $numberUsed < $module->max_options) {
        $optionUsed = is_null(Used::where('module_id',$idModule)
          ->where('student_id',1)
          ->where('option_used',$numberRandom)
          ->first());
        if($optionUsed) {
          
          $options[] = $numberRandom;
          $correcta = $numberRandom;
         
          $options_final[] = [
            'id' => $numberRandom,
            'name' => Option::where('number_option',$numberRandom)->first()->name,
            'of_course' => true
          ];
          $i+=1;
        }
      }elseif (!in_array($numberRandom, $options)) {
        $options[] = $numberRandom;
        
        $options_final[] = [
          'id' => $numberRandom,
          'name' => Option::where('number_option',$numberRandom)->first()->name,
          'of_course' => false
        ];
      }

    } while (count($options) != 3);
    
    shuffle($options_final);

    return response()->json([$options_final,$numberUsed+1,$correcta],200);
  }

  public function apiLearn($idModule,$idOption)
  {
    $module = Module::findOrFail($idModule);
    $options_final = [];

    $idOption+=1;

    foreach ($module->options()->where('number_option',$idOption)->get() as $option) {
      $options_final[] = [
        'id' => $option->number_option,
        'name' => $option->name
      ]; 
    }

    return response()->json([$options_final,$idOption]);
  }
}
