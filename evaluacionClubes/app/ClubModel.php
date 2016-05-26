<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClubModel extends Model
{
    protected $table = 'clubes';

    public function zona(){return $this->belongsTo('App\ZonaModel','idZona','id');}

    public function campo(){return $this->belongsTo('App\CampoModel','idCampo','id');}
}
