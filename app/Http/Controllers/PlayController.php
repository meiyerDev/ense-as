<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Student,Score,Used};

class PlayController extends Controller
{
    public function index()
    {
    	return view('play.index');
    }

    public function apiUpdatePuntaje(int $idModule,int $idStudent,$score,$answer)
    {
    	$scores = Score::where('student_id',$idStudent)->where('module_id',$idModule)->first();
        
        $score_final = 0;

        if (is_null($scores)) {
            $scores_new = new Score();
            $scores_new->student_id = $idStudent;
            $scores_new->module_id = $idModule;
            $scores_new->score += $score;
            $scores_new->save();
            $score_final = $scores_new->score;
        }else{
    		$scores->score += $score;
    		$scores->update();
            $score_final = $scores->score;
        }
        
        if ($answer > 0) {
            $used = Used::create([
                'student_id' => $idStudent,
                'module_id' => $idModule,
                'option_used' => $answer
            ]);
        }

    	return response()->json($score_final,201);
    }

    public function apiStudentAll()
    {
        $student = Student::select(['id','firstname','lastname','identity',])->get();

        return response()->json($student,200);
    }

    public function apiResetScore($idStudent)
    {
        $student = Student::findOrFail($idStudent);

        $student->module()->detach();

        $student->useds()->delete();

        return response()->json('¡Se ha Reiniciado el Puntaje con Exito!',200);
    }
}
