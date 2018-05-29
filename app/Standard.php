<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Standard extends Model
{
    protected $table = 'standards';
    protected $fillable = [];
    protected $guarded = ['id'];

    public function companyprofile()
    {
        return $this->belongsTo('App\Companyprofile');
    }

    public function mgmtrep()
    {
        return $this->hasMany('App\Mgmtrep');
    }

    public function member()
    {
        return $this->hasMany('App\Member');
    }

    public function manager()
    {
        return $this->hasMany('App\Manager');
    }
}
