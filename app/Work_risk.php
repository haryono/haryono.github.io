<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Work_risk extends Model
{
    protected $table = 'work_risks';
    protected $fillable = [];
    protected $guarded = ['id'];

    public function inv_of_work()
    {
        return $this->belongsTo('App\Inv_of_work');
    }

    public function riskassessment()
    {
        return $this->belongsTo('App\Riskassessment');
    }
}
