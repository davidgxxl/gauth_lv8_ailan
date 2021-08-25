<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Laravel\Socialite\Facades\Socialite;
use App\Models\Usuario;

class SesionController extends Controller
{

    // Ingreso
    public function usuarioGoogle(){

        // Validación
        $usuarioGoogle = Socialite::driver('google')->user();

        // Proceso
        if ( !$usuario = Usuario::where('email', $usuarioGoogle->user['email'])->first() ) {
            $usuario = new Usuario;
            $usuario->nombre = $usuarioGoogle->user['given_name'];
            $usuario->apellido = $usuarioGoogle->user['family_name'];
            $usuario->email = $usuarioGoogle->user['email'];
            $usuario->remember_token = uniqid();
            $usuario->save();
        }

        // Envio correo con código de verificación
        Mail::send('correos.codigo-verificacion', [
            'asunto'                =>  $asunto = 'Código de verificación',
            'codigo_verificacion'   =>  $usuario->remember_token
        ], function($m) use ($usuario, $asunto){
            $m->to($usuario->email);
            $m->subject($asunto);
        });

        // Respuesta
        return redirect()->route('codigo-verificacion');
    }

    // Ingreso
    public function ingreso(Request $rq){

        // Validación
        $rq->validate([
            'remember_token' => 'required|exists:' . (new Usuario)->getTable() . ',remember_token'
        ]);

        // Proceso
        Auth::login(
            Usuario::where('remember_token', $rq->remember_token)->first()
        );

        // Respuesta
        return redirect()->route('inicio');
    }
}