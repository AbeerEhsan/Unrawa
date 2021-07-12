<?php

namespace App\Repositories;

use App\Models\Forward;
use App\Repositories\BaseRepository;

/**
 * Class ForwardRepository
 * @package App\Repositories
 * @version October 1, 2020, 4:42 am UTC
*/

class ForwardRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Forward::class;
    }
}
