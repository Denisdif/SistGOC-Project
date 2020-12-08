<?php

namespace Cardumen\ArgentinaProvinciasLocalidades\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;


class Localidad extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $table = 'localidades';
    protected $guarded = [];

    public function provincia(){
    	return $this->belongsTo(Provincia::class);
    }
}

