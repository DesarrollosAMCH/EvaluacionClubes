<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\ClubModel;

class ClubesController extends AdminController
{

    public function listar(){
        $oClubesList                    =   ClubModel::all();
        $this->__vars['oClubesList']    =   $oClubesList;

        return view('Admin.Clubes.ListarClubes', $this->__vars);
    }
}