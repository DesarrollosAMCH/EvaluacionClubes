<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ZonaModel extends Model
{
    protected $table = 'zonas';

    public function clubes()
    {
        return $this->hasMany('App\ClubModel');
    }

}
