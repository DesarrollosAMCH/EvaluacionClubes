<?php

namespace App\Http\Controllers\Admin;

use App\TemporadaModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EvaluacionController extends Controller
{

    public function nueva(){
        return view('Admin.Evaluaciones.CrearEvaluacion');
    }

    public function listar(){
        return view('Admin.Evaluaciones.ListarEvaluaciones');
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
}