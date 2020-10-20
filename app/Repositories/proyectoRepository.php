<?php

namespace App\Repositories;

use App\Models\Proyecto;
use App\Repositories\BaseRepository;

/**
 * Class ProyectoRepository
 * @package App\Repositories
 * @version October 9, 2020, 1:03 am UTC
*/

class ProyectoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Nombre_proyecto',
        'Tipo_proyecto_id',
        'Nro_plantas',
        'Fecha_inicio_Proy',
        'Fecha_fin_Proy',
        'Director_id',
        'Comitente_id',
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
        return Proyecto::class;
    }
}
