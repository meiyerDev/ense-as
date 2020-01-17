<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Used extends Model
{
    protected $fillable = [
    	'student_id',
    	'module_id',
    	'option_used',
  	];
}
