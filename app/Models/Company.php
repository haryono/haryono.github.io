<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;


class Company extends Model
{
    use SoftDeletes;

    public $table = 'companies';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'Name',
        'Description',
        'CompanyEmail',
        'EffectiveDate'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'Name' => 'string',
        'Description' => 'string',
        'CompanyEmail' => 'string',
        'EffectiveDate' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'Name' => 'required',
        'Description' => 'required',
        'CompanyEmail' => 'required|email',
        'EffectiveDate' => 'required|date'
    ];
}
