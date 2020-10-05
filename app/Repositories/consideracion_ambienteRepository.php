<?php

namespace App\Repositories;

use App\Models\consideracion_ambiente;
use App\Repositories\BaseRepository;

/**
 * Class consideracion_ambienteRepository
 * @package App\Repositories
 * @version October 3, 2020, 6:39 am UTC
*/

class consideracion_ambienteRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Complejidad',
        'Ambiente_id',
        'Consideracion_id'
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
        return consideracion_ambiente::class;
    }
}
