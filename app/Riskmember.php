<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Riskmember extends Model
{
    protected $table = 'riskmembers';
    protected $fillable = [];
    protected $guarded = ['id'];

    public function riskassessment()
    {
        return $this->belongsTo('App\Riskassessment');
    }
}
