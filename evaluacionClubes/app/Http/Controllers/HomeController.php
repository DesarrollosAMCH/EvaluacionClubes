<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function home(Request $request){
        return view('App/ComingSoon');
        //return view('App/Home');
    }
}