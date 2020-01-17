<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
  protected $fillable = [
    'firstname',
    'lastname',
    'identity',
    'gender',
    'finish',
    'email',
    'mobileno',
    'address',
    'imageico',
    'curse_id',
    'user_id'
  ];

  public function curse()
  {
    return $this->belongsTo(\App\Curse::class);
  }

  public function user()
  {
    return $this->belongsTo(\App\User::class);
  }
}
