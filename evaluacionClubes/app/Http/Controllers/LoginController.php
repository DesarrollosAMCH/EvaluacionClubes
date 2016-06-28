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

            
            $oUser->save();
            $oClub->idUsuario = $oUser->id;
            $oClub->save();
            

            $data = array(
                'id_club'   => $oClub->id,
                'club'      => $oClub->nombre,
                'email'     => MiembroModel::directorDeClub($oClub->id)->first()->email,
                'username'  => $name,
                'password'  => $password,
                'token'     => $oUser->activation_token,
                'domain'    => App::make('url')->to('/')
            );

            $message = "Benvenido";
            \Mail::send('App.Emails.RegisterTmpl', $data, function($message) use ($data)
            {
                $message
                    ->to($data['email'], $data['club'])
                    ->subject("Activación de Cuenta - Regional AMCH");
            });
            return redirect('/register')->with(['alert'=>true,'type'=>'success', 'msg'=>'Se ha enviado un E-Mail al director del club '.$data['club'].' para que active el acceso.']);
        }else{
            return redirect('/register')->with(['alert'=>true,'type'=>'danger', 'msg'=> $msg]);
        }
    }

    public function activate($token, $club, $email){
        $oClub = ClubModel::find($club);

        if($oClub->usuario->activation_token === $token){
            $oUser = User::find($oClub->usuario->id);
            $oUser->active = 1;
            $oUser->email = $email;

            if( $oUser->save() ){
                return redirect('/login')->with([
                    'alert' => true,
                    'type' => 'success',
                    'msg' => 'El Club '. $oClub->nombre . ' ha sido activado'
                    ]
                );
            }else{
                return redirect('/404');
            }
        }
    }

    public function mailing(){
        $vars = [
            'id_club' => 1,
            'club' => 'Regional AMCH',
            'username' => 'regional',
            'password' => 'regional*',
            'email'   => 'niko.afv@gmail.com',
            'token' => '11sd2f15sf4s48sd4fg8sd4f8sdfs5df45sd4f5sd4f5sd4f54',
            'domain' => App::make('url')->to('/')
        ];
        return view('App.Emails.RegisterTmpl', $vars);
    }
}