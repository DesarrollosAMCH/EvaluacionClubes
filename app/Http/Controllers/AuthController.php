<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

abstract class AuthController extends Controller{

    protected $__var;

    public function __construct(){
        $this->middleware('auth');
    }
}
