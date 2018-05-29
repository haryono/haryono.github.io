<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Companyprofile extends Model
{
    protected $table = 'companyprofiles';
    protected $fillable = [];
    protected $guarded = ['id'];

    public function riskassessment()
    {
        return $this->hasMany('App\Riskassessment');
    }

    public function salesperson()
    {
        return $this->hasMany('App\Salesperson');
    }

    public function consultant()
    {
        return $this->hasMany('App\Consultant');
    }

    public function bizsafe()
    {
        return $this->hasMany('App\Bizsafe');
    }

    public function standard()
    {
        return $this->hasMany('App\Standard');
    }

}
