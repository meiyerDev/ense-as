<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    protected $fillable = [
    	'student_id',
    	'module_id',
    	'score',
  	];

  	public function student()
  	{
  		return $this->belongsTo('App\Student');
  	}

  	public function module()
  	{
  		return $this->belongsTo('App\module');
  	}
}
