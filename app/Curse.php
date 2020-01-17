<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curse extends Model
{
  protected $fillable = [
    'grade',
    'section',
  ];

  public function students()
  {
  	return $this->hasMany(\App\Student::class);
  }

  public function teachers()
  {
  	return $this->hasMany(\App\Teacher::class);
  }
}
