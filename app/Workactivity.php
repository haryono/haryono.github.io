<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workactivity extends Model
{
    protected $table = 'workactivities';
    protected $fillable = [];
    protected $guarded = ['id'];

    public function riskassessment()
    {
        return $this->belongsTo('App\Riskassessment');
    }

    public function hazard()
    {
        return $this->hasMany('App\Hazard');
    }

}
