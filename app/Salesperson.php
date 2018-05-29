<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salesperson extends Model
{
    protected $table = 'salespersons';
    protected $fillable = [];
    protected $guarded = ['id'];

    public function riskassessment()
    {
        return $this->belongsTo('App\Companyprofile');
    }


}
