<?php
namespace App\Http\Controllers\App;

use App\RequisitoModel;
use App\TemporadaModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EvaluacionController extends Controller
{
    private $__vars = [];

    public function listar(Request $request){
        $this->__vars['oEvaluacionesList'] = TemporadaModel::all();
        return view('App/ListarEvaluaciones', $this->__vars);
    }

    public function requisitos($id){
        $this->__vars['oEvaluacion'] = TemporadaModel::findTreeToArray($id);
        return view('App/ListarRequisitos', $this->__vars);
    }

    public function requisito($id){
        $this->__vars['oRequisito'] = RequisitoModel::find($id);
        return view('App/CompletarRequisito', $this->__vars);
    }
}