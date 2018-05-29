<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ra_register extends Model
{
    protected $table = 'ra_registers';
    protected $fillable = [];
    protected $guarded = ['id'];

    public function ra_risk()
    {
        return $this->hasMany('App\Ra_risk');
    }
}
