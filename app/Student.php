<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
  protected $fillable = [
    'firstname',
    'lastname',
    'identity',
    'gender',
    'finish',
    'mobileno',
    'representant',
    'address',
    'curse_id',
  ];

  public function curse()
  {
    return $this->belongsTo(\App\Curse::class);
  }

  public function module()
  {
    return $this->belongsToMany('App\Module','scores','student_id','module_id')
      // ->as('scores')
      ->withPivot(['id','score'])
      ->withTimestamps();
  }

  public function useds()
  {
    return $this->hasMany('App\Used');
  }
}
