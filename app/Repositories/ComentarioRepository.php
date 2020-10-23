<?php

namespace App\Repositories;

use App\Models\Comentario;
use App\Repositories\BaseRepository;

/**
 * Class ComentarioRepository
 * @package App\Repositories
 * @version October 22, 2020, 9:46 pm UTC
*/

class ComentarioRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Contenido',
        'Tarea_id'
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
        return Comentario::class;
    }
}
