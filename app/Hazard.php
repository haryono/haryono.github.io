<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hazard extends Model
{
    protected $table = 'hazards';
    protected $fillable = [];
    protected $guarded = ['id'];

    public function workactivity()
    {
        return $this->belongsTo('App\Workactivity');
    }
}
