<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TemporadaModel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'temporadas';

    public function requisitos(){return $this->hasMany('App\RequisitoModel','idTemporada','id');}


    public static function findTreeToArray($id){
        $oTemporada =  TemporadaModel::where('id',$id);
        if ( is_object( $oTemporada) ){
            return $oTemporada->with('requisitos.categoria')->get()->first();
        }else{
            return false;
        }
    }


    public function getCategoriasRequisitos(){
        $requisitosList = $this->requisitos;
        $categorias = [];

        foreach( $requisitosList as $requisito ){
            $categorias[] = $requisito->categoria;
        }
        return array_unique($categorias);
    }
}
