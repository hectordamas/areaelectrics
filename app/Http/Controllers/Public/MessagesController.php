<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;

class MessagesController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telephone' => 'required|string',
            'message' => 'required|string',
            'subject' => 'required|string',
        ]);

        Message::create($request->only('name', 'email', 'message', 'telephone', 'subject'));

        // Enviar correo (necesitarás configurar tu correo en .env)
        try {
            \Mail::to(env('MAIL_TO_ADDRESS'))->send(new \App\Mail\ContactFormMail($request->all()));
        } catch (\Exception $e) {
            // Aquí podrías registrar el error si es necesario, pero el proceso continuará
            Log::error('Error enviando correo: ' . $e->getMessage());
        }
    

        return redirect()->back()->with('message', 'Tu mensaje ha sido enviado.');
    }
}
