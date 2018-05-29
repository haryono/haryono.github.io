<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bizsafe extends Model
{
    protected $table = 'bizsafes';
    protected $fillable = [];
    protected $guarded = ['id'];

    public function companyprofile()
    {
        return $this->belongsTo('App\Companyprofile');
    }

    public function raleader()
    {
        return $this->hasMany('App\Raleader');
    }

    public function ramember()
    {
        return $this->hasMany('App\Ramember');
    }

    public function approvingmanager()
    {
        return $this->hasMany('App\Approvingmanager');
    }
}
