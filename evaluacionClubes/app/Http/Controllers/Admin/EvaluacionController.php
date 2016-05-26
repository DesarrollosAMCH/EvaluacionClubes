<?php

namespace App\Http\Controllers\Admin;

use App\CategoriaRequisitoModel;
use App\RequisitoModel;
use App\TemporadaModel;
use Illuminate\Http\Request;


class EvaluacionController extends AdminController
{
    public function listar(){
        return view('Admin.Evaluaciones.ListarEvaluaciones');
    }

    public function nueva(){
        $this->__vars['oCategoriasList']    =   CategoriaRequisitoModel::all();
        return view('Admin.Evaluaciones.CrearEvaluacion', $this->__vars);
    }

    public function saveTemporada(Request $request)
    {
        $nombre = $request->get('nombre_temporada');
        $daterage = explode(' - ',$request->get('daterange'));

        $oTemporada = new TemporadaModel();
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

    public function saveRequisito(Request $request)
    {
        if($request->ajax()) {
            $categoria = $request->get('categoria');
            $nombre = $request->get('nombre');
            $descripcion = $request->get('descripcion');
            $valor = $request->get('valor');
            $daterage = explode(' - ', $request->get('daterange'));
            $temporada = $request->get('temporada');


            $oRequisito = new RequisitoModel();
            $oRequisito->nombre = $nombre;
            $oRequisito->descripcion = $descripcion;
            $oRequisito->valor = $valor;
            $oRequisito->fecha_inicio = $daterage[0];
            $oRequisito->fecha_termino = $daterage[1];
            $oRequisito->categoria = $categoria;
            $oRequisito->temporada = $temporada;


            if ($oRequisito->save()) {
                $data = ['id' => $oTemporada->id];
                echo jsonResponse($data, 10001);
            } else {
                echo jsonResponse(NULL, 10002, true);
            }
        }else{

        }
    }
}