<?php
namespace App\Http\Controllers\App;

use Illuminate\Http\Request;
use Auth;

use App\RequisitoRealizadoModel;
use App\RequisitoModel;
use App\TemporadaModel;
use App\MiembroModel;




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

    public function requisito($id_requisito){
        $this->__vars['oRequisito'] = RequisitoModel::find($id_requisito);
        return view('App/CompletarRequisito', $this->__vars);
    }

    public function guardarRequisito(Request $request, $id_requisito){
        $inputs = $request->all();
        $oUser = Auth::user();
        $oMiembro = MiembroModel::where('email', $oUser->email)->get()->first();

        $oRequisito = new RequisitoRealizadoModel();

        $oRequisito->fecha          = $inputs['fecha'];
        $oRequisito->lugar          = $inputs['donde'];
        $oRequisito->contenido      = $inputs['comentario'];
        $oRequisito->idRequisito    = $id_requisito;
        $oRequisito->idClub         = $oMiembro->idClub;

        $oRequisito->save();

    }
}