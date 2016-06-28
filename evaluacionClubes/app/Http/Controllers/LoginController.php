<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

use App\Http\Controllers\Controller;


use App\ClubModel;
use App\MiembroModel;
use App\User;

class LoginController extends Controller
{
    private $__vars = [];

    public function login(Request $request){
        $this->__vars['clubesList'] = ClubModel::conUsuario()->get();
        return view('Login', $this->__vars);
    }

    public function registerForm(Request $request){
        $this->__vars['clubesList'] = ClubModel::sinUsuario()->get();
        return view('Register', $this->__vars);
    }

    public function register(){
        $error      = false;
        $name       = \Input::get('username');
        $password   = \Input::get('password');
        $club       = \Input::get('club');
        $oUser = new User;

        $oUser->name             =  $name;
        $oUser->password         =  \Hash::make($password);
        $oUser->activation_token =  str_random(150);

        $oClub = ClubModel::findOrFail($club);

        if(!$oClub->tieneDirector()){
            $error = true;
            $msg = 'Club no tiene Director';
        }

        if(!$error){

            /*$oUser->save();*/

            $data = array(
                'id_club'   => $oClub->id,
                'club'      => $oClub->nombre,
                'email'     => MiembroModel::directorDeClub($oClub->id)->first()->email,
                'username'  => $name,
                'password'  => $password,
                'token'     => $oUser->activation_token
            );

            $message = "Benvenido";
            \Mail::send('App.Emails.RegisterTmpl', $data, function($message) use ($data)
            {
                $message
                    ->to($data['email'], $data['club'])
                    ->subject("Activación de Cuenta AMCH - ". $data['club']);
            });
            return redirect('/register')->with(['alert'=>true,'type'=>'success', 'msg'=>'Se ha enviado un E-Mail al director del club '.$data['club'].' para que active el acceso.'])
                ->with("msg",'info')
                ;
        }else{
            return redirect('/register')->with(['alert'=>true,'type'=>'danger', 'msg'=> $msg]);
        }

    }
}