<?php

namespace App\Http\Controllers\Admin;

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

    public function saveTemporada(Request $request){

        $nombre = $request->get('nombre_temporada');
        $datrage = $request->get('daterange');

        var_dump($datrage);
    }
}