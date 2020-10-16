<?php

namespace App\Repositories;

use App\Models\Personal;
use App\Repositories\BaseRepository;

/**
 * Class PersonalRepository
 * @package App\Repositories
 * @version October 13, 2020, 2:06 am UTC
*/

class PersonalRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'NombrePersonal',
        'Apellido',
        'Legajo',
        'FechaNac',
        'DNI',
        'User_id'
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
        return Personal::class;
    }
}
