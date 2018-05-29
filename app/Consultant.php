<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consultant extends Model
{
  protected $table = 'consultants';
  protected $fillable = [];
  protected $guarded = ['id'];

  public function riskassessment()
  {
      return $this->belongsTo('App\Companyprofile');
  }

  
}
