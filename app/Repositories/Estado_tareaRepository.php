<?php

namespace App\Repositories;

use App\Models\Estado_tarea;
use App\Repositories\BaseRepository;

/**
 * Class Estado_tareaRepository
 * @package App\Repositories
 * @version October 10, 2020, 12:35 pm UTC
*/

class Estado_tareaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Nombre_estado_tarea',
        'Descripcion'
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
        return Estado_tarea::class;
    }
}
