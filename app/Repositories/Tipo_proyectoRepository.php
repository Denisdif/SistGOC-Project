<?php

namespace App\Repositories;

use App\Models\Tipo_proyecto;
use App\Repositories\BaseRepository;

/**
 * Class Tipo_proyectoRepository
 * @package App\Repositories
 * @version October 19, 2020, 2:26 am UTC
*/

class Tipo_proyectoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Nombre',
        'Descripcion_tipo'
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
        return Tipo_proyecto::class;
    }
}
