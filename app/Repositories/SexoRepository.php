<?php

namespace App\Repositories;

use App\Models\Sexo;
use App\Repositories\BaseRepository;

/**
 * Class SexoRepository
 * @package App\Repositories
 * @version October 19, 2020, 1:52 am UTC
*/

class SexoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Nombre_sexo'
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
        return Sexo::class;
    }
}
