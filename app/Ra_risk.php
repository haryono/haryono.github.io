<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ra_risk extends Model
{
    protected $table = 'ra_risks';
    protected $fillable = [];
    protected $guarded = ['id'];

    public function ra_register()
    {
        return $this->belongsTo('App\Ra_register');
    }

    public function riskassessment()
    {
        return $this->belongsTo('App\Riskassessment');
    }
}
