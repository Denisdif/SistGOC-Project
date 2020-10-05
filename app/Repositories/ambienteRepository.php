<?php

namespace App\Repositories;

use App\Models\ambiente;
use App\Repositories\BaseRepository;

/**
 * Class ambienteRepository
 * @package App\Repositories
 * @version October 3, 2020, 6:32 am UTC
*/

class ambienteRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Nombre_ambiente',
        'Imagen',
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
        return ambiente::class;
    }
}
