<?php

namespace App\Repositories;

use App\Models\Predecesora;
use App\Repositories\BaseRepository;

/**
 * Class PredecesoraRepository
 * @package App\Repositories
 * @version November 25, 2020, 7:43 am -03
*/

class PredecesoraRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Tarea_id',
        'Predecesora_id'
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
        return Predecesora::class;
    }
}
