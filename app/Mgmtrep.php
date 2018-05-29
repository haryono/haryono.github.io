<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mgmtrep extends Model
{
  protected $table = 'mgmtreps';
  protected $fillable = [];
  protected $guarded = ['id'];

  public function standard()
  {
      return $this->belongsTo('App\Standard');
  }
}
