<?php

namespace App\Repositories;

use App\Models\Hazardlist;
use InfyOm\Generator\Common\BaseRepository;

class HazardlistRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id',
        'name'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Hazardlist::class;
    }
}
