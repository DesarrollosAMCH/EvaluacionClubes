<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequisitoModel extends Model
{
    protected $table = 'requisitos';

    public function categoria(){return $this->belongsTo('App\CategoriaRequisitoModel','idCategoria','id');}
}
