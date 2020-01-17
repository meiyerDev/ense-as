<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $fillable = [
    	'name',
    	'number_option',
    	'module_id',
  	];
}
