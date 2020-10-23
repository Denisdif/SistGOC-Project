<?php

namespace App\Repositories;

use App\Models\Evaluacion;
use App\Repositories\BaseRepository;

/**
 * Class EvaluacionRepository
 * @package App\Repositories
 * @version October 23, 2020, 3:19 am UTC
*/

class EvaluacionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Evaluador_id',
        'Personal_id',
        'Fecha_inicio',
        'Fecha_fin'
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
        return Evaluacion::class;
    }
}
