<?php

namespace App\Repositories;

use App\Models\AsignacionPersonalTarea;
use App\Repositories\BaseRepository;

/**
 * Class AsignacionPersonalTareaRepository
 * @package App\Repositories
 * @version October 13, 2020, 3:46 am UTC
*/

class AsignacionPersonalTareaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Responsabilidad',
        'Personal_id',
        'Tarea_id'
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
        return AsignacionPersonalTarea::class;
    }
}
