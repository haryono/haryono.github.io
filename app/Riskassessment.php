<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Riskassessment extends Model
{
    protected $table = 'riskassessments';
    protected $fillable = [];
    protected $guarded = ['id'];

    public function inv_of_work()
    {
        return $this->belongsTo('App\Inv_of_work');
    }
    
    public function companyprofile()
    {
        return $this->belongsTo('App\Companyprofile');
    }

    public function workactivity()
    {
        return $this->hasMany('App\Workactivity');
    }

    public function work_risk()
    {
        return $this->hasMany('App\Work_risk');
    }

    public function ra_risk()
    {
        return $this->hasMany('App\Ra_risk');
    }

    public function ra_plan()
    {
        return $this->hasMany('App\Ra_plan');
    }




}
