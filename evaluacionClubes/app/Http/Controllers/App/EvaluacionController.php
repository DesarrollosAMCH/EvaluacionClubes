<?php
namespace App\Http\Controllers\App;

use App\CategoriaRequisitoModel;
use App\RequisitoModel;
use App\TemporadaModel;
use Illuminate\Http\Request;
use App\Http\Controllers\App\AppController;

class EvaluacionController extends AppController
{

    public  function __construct(){
        parent::__construct();
    }

    public function listar(Request $request){
        $this->__vars['oEvaluacionesList'] = TemporadaModel::all();
        return view('App/ListarEvaluaciones', $this->__vars);
    }

    public function requisitos($id_temporada){
        $oEveluación    = TemporadaModel::findTreeToArray($id_temporada);
        $categoriasList = TemporadaModel::find($id_temporada)->getCategoriasRequisitos();
        $this->__vars['oEvaluacion']        = $oEveluación;
        $this->__vars['categoriasList']     = $categoriasList;

        return view('App/ListarRequisitos', $this->__vars);
    }

    public function requisito($id){
        $this->__vars['oRequisito'] = RequisitoModel::find($id);
        return view('App/CompletarRequisito', $this->__vars);
    }
}