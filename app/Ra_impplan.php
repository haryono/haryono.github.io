<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ra_impplan extends Model
{
    protected $table = 'ra_impplans';
    protected $fillable = [];
    protected $guarded = ['id'];

    public function ra_plan()
    {
        return $this->hasMany('App\Ra_plan');
    }
}
