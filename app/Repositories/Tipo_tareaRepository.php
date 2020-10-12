<?php

namespace App\Repositories;

use App\Models\Tipo_tarea;
use App\Repositories\BaseRepository;

/**
 * Class Tipo_tareaRepository
 * @package App\Repositories
 * @version October 10, 2020, 12:37 pm UTC
*/

class Tipo_tareaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Nombre_tipo_tarea',
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
        return Tipo_tarea::class;
    }
}
