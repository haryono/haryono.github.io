<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
  protected $table = 'managers';
  protected $fillable = [];
  protected $guarded = ['id'];

  public function standard()
  {
      return $this->belongsTo('App\Standard');
  }
}
