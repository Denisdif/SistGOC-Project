<?php

namespace App\Repositories;

use App\Models\consideracion;
use App\Repositories\BaseRepository;

/**
 * Class consideracionRepository
 * @package App\Repositories
 * @version October 3, 2020, 6:27 am UTC
*/

class consideracionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Nombre_Consideracion',
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
        return consideracion::class;
    }
}
