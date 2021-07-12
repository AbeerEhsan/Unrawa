<?php

namespace App\Repositories;

use App\Models\Transfer;
use App\Repositories\BaseRepository;

/**
 * Class TransferRepository
 * @package App\Repositories
 * @version September 25, 2020, 5:53 pm UTC
*/

class TransferRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'driver_id',
        'cart_note',
        'day',
        'date',
        'time',
        'category_id',
        'to'
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
        return Transfer::class;
    }
}
