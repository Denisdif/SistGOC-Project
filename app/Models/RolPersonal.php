<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * Class RolPersonal
 * @package App\Models
 * @version October 13, 2020, 1:13 am UTC
 *
 * @property string $NombreRol
 * @property string $Descripcion
 */
class RolPersonal extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use SoftDeletes;
    protected $guarded = [];

    public $table = 'roles_usuario';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'NombreRol',
        'Descripcion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'NombreRol' => 'string',
        'Descripcion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'NombreRol' => 'required',
    ];

    public function User()
    {
        return $this->hasMany(User::class);
    }

}
