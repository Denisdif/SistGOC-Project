<?php

namespace App\Repositories;

use App\Models\Asistencia;
use App\Repositories\BaseRepository;

/**
 * Class AsistenciaRepository
 * @package App\Repositories
 * @version December 12, 2020, 12:36 am -03
*/

class AsistenciaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'User_id',
        'Entrada',
        'Salida'
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
        return Asistencia::class;
    }
}
