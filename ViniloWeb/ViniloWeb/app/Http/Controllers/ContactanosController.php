<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactEmail;

class ContactanosController extends Controller
{
    public function main()
    {
        return view('contactanos');
    }

    public function send(Request $request)
    {
        $request->validate(
            [
                'nombre' =>'required',
                'email' =>'required|email',
                'mensaje' =>'required|max:1000'
            ]);

        $nombre = $request->input('nombre');
        $email = $request->input('email');
        $mensaje = $request->input('mensaje');
    
        // Enviar el correo electrónico a la dirección en concreto
        Mail::to('viniloweb.info@gmail.com')->send(new ContactEmail($nombre, $email, $mensaje));
        
        // Redirigir a una página de éxito o mostrar un mensaje de éxito
        return redirect()->back()->with('success', '¡Mensaje enviado con éxito!');
    }
}
