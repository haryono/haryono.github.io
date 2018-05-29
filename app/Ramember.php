<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ramember extends Model
{
    protected $table = 'ramembers';
    protected $fillable = [];
    protected $guarded = ['id'];

    public function bizsafe()
    {
        return $this->belongsTo('App\Bizsafe');
    }
}
