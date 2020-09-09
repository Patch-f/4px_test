<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'name',
      'description',
  ];

  /**
   * All users who are in the section
   */
  public function users()
  {
    return $this->belongsToMany('App\User');
  }
}
