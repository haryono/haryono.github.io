<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ra_plan extends Model
{
    protected $table = 'ra_plans';
    protected $fillable = [];
    protected $guarded = ['id'];

    public function ra_impplan()
    {
        return $this->belongsTo('App\Ra_impplan');
    }

    public function riskassessment()
    {
        return $this->belongsTo('App\Riskassessment');
    }
}
