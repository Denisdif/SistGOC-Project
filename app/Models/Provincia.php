<?php

namespace Cardumen\ArgentinaProvinciasLocalidades\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Provincia extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    protected $guarded = [];

    protected $table = 'provincias';


    public function pais(){
    	return $this->belongsTo(Pais::class);
    }

    public function localidades(){
    	return $this->hasMany(Localidad::class);
    }
}
