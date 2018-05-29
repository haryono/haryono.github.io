<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inv_of_work extends Model
{
    protected $table = 'inv_of_works';
    protected $fillable = [];
    protected $guarded = ['id'];


    public function riskassessment()
    {
        return $this->hasMany('App\Riskassessment');
    }

    public function work_risk()
    {
        return $this->hasMany('App\Work_risk');
    }


}
