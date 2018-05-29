<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Raleader extends Model
{
    protected $table = 'raleaders';
    protected $fillable = [];
    protected $guarded = ['id'];

    public function bizsafe()
    {
        return $this->belongsTo('App\Bizsafe');
    }
}
