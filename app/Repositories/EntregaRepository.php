<?php

namespace App\Repositories;

use App\Models\Entrega;
use App\Repositories\BaseRepository;

/**
 * Class EntregaRepository
 * @package App\Repositories
 * @version October 22, 2020, 9:43 pm UTC
*/

class EntregaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Archivo',
        'Descripcion_entrega',
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
        return Entrega::class;
    }
}
