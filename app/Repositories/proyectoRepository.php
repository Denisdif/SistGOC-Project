<?php

namespace App\Repositories;

use App\Models\proyecto;
use App\Repositories\BaseRepository;

/**
 * Class proyectoRepository
 * @package App\Repositories
 * @version October 5, 2020, 3:19 pm UTC
*/

class proyectoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Nombre_proyecto',
        'Tipo',
        'Fecha_inicio',
        'Fecha_fin',
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
        return proyecto::class;
    }
}
