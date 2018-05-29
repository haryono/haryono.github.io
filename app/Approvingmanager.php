<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Approvingmanager extends Model
{
    protected $table = 'approvingmanagers';
    protected $fillable = [];
    protected $guarded = ['id'];

    public function bizsafe()
    {
        return $this->belongsTo('App\Bizsafe');
    }
}
