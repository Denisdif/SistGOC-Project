<?php

namespace App\Repositories;

use App\Models\RolPersonal;
use App\Repositories\BaseRepository;

/**
 * Class RolPersonalRepository
 * @package App\Repositories
 * @version October 13, 2020, 1:13 am UTC
*/

class RolPersonalRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'NombreRol',
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
        return RolPersonal::class;
    }
}
