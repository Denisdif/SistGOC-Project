<?php

namespace App\Repositories;

use App\Models\Direccion;
use App\Repositories\BaseRepository;

/**
 * Class DireccionRepository
 * @package App\Repositories
 * @version October 19, 2020, 1:09 am UTC
*/

class DireccionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Calle',
        'Altura',
        'Pais_id',
        'Provincia_id',
        'Localidad_id'
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
        return Direccion::class;
    }
}
