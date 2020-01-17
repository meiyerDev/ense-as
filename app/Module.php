<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $fillable = [
    	'name',
    	'max_options',
    	'link',
  	];

  	public function options()
  	{
  		return $this->hasMany('App\Option');
  	}

  	public function students()
  	{
	    return $this->belongsToMany('App\Student','scores','module_id','student_id')
        ->withPivot(['id','score'])
        ->withTimestamps();
  	}
}
