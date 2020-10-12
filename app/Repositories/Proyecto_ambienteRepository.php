<?php

namespace App\Repositories;

use App\Models\Proyecto_ambiente;
use App\Repositories\BaseRepository;

/**
 * Class Proyecto_ambienteRepository
 * @package App\Repositories
 * @version October 9, 2020, 2:07 am UTC
*/

class Proyecto_ambienteRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Cantidad',
        'Ambiente_id',
        'Proyecto_id'
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
        return Proyecto_ambiente::class;
    }
}
