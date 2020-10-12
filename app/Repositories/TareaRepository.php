<?php

namespace App\Repositories;

use App\Models\Tarea;
use App\Repositories\BaseRepository;

/**
 * Class TareaRepository
 * @package App\Repositories
 * @version October 12, 2020, 3:47 pm UTC
*/

class TareaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Nombre_tarea',
        'Fecha_inicio',
        'Fecha_fin',
        'Valor',
        'Correcciones',
        'Descripcion_tarea',
        'Proyecto_id',
        'Tipo_tarea_id',
        'Estado_tarea_id'
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
        return Tarea::class;
    }
}
