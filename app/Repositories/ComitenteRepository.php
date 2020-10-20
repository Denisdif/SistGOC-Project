<?php

namespace App\Repositories;

use App\Models\Comitente;
use App\Repositories\BaseRepository;

/**
 * Class ComitenteRepository
 * @package App\Repositories
 * @version October 19, 2020, 2:40 am UTC
*/

class ComitenteRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'NombreComitente',
        'Apellido',
        'Email',
        'Telefono',
        'DNI',
        'Sexo',
        'Direccion_id'
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
        return Comitente::class;
    }
}
