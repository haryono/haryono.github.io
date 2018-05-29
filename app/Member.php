<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
  protected $table = 'members';
  protected $fillable = [];
  protected $guarded = ['id'];

  public function standard()
  {
      return $this->belongsTo('App\Standard');
  }
}
