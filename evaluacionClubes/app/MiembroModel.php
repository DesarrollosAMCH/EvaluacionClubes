<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MiembroModel extends Model
{
    protected $table = 'miembros';


    public function scopeDirectorDeClub($query, $club){
        return $query->
            join('miembrosCargos', 'miembros.id', '=', 'miembrosCargos.idMiembro')->
            where('idClub',$club)->where('miembrosCargos.idCargo',1);
    }
}
