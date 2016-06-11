<?php

namespace App\Http\Controllers\Admin;

use App\CategoriaRequisitoModel;
use App\RequisitoModel;
use App\TemporadaModel;
use Illuminate\Http\Request;


class EvaluacionController extends AdminController
{
    public function listar(){
        $this->__vars['oEvaluacionesList'] = TemporadaModel::all();
        return view('Admin.Evaluaciones.ListarEvaluaciones', $this->__vars);
    }

    public function nueva(){
        $this->__vars['oCategoriasList']    =   CategoriaRequisitoModel::all();
        return view('Admin.Evaluaciones.CrearEvaluacion', $this->__vars);
    }

    public function editar($id){
        $this->__vars['oCategoriasList']    =   CategoriaRequisitoModel::all();
        $this->__vars['oTemporada']         =   TemporadaModel::findTreeToArray($id);
        return view('Admin.Evaluaciones.CrearEvaluacion', $this->__vars);
    }

    public function saveTemporada(Request $request, $id_temporada=null)
    {
        $nombre = $request->get('nombre_temporada');
        $daterage = explode(' - ',$request->get('daterange'));

        $oTemporada = TemporadaModel::findOrNew($id_temporada);
        $oTemporada->nombre = $nombre;
        $oTemporada->fecha_inicio = $daterage[0];
        $oTemporada->fecha_termino = $daterage[1];

        if($oTemporada->save()){
            $data = ['id'=>$oTemporada->id];
            echo jsonResponse($data, 10001);
        }else{
            echo jsonResponse(NULL, 10002,true);
        }
    }

    public function saveRequisito(Request $request, $id = null)
    {
        if($request->ajax()) {
            $categoria = $request->get('categoria');
            $nombre = $request->get('nombre');
            $descripcion = $request->get('descripcion');
            $valor = $request->get('valor');
            $daterage = explode(' - ', $request->get('daterange'));
            $temporada = $request->get('temporada');


            $oRequisito = RequisitoModel::findOrNew($id);
            $oRequisito->nombre = $nombre;
            $oRequisito->descripcion = $descripcion;
            $oRequisito->valor = $valor;
            //$oRequisito->fecha_inicio = $daterage[0];
            //$oRequisito->fecha_termino = $daterage[1];
            $oRequisito->idCategoria = $categoria;
            $oRequisito->idTemporada = $temporada;


            if ($oRequisito->save()) {
                $data = ['id' => $oRequisito->id];
                echo jsonResponse($data, 10001);
            } else {
                echo jsonResponse(NULL, 10002, true);
            }
        }else{

        }
    }
}