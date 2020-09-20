<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $messaggi = Message::All()->where('id_ricevente', $userId);
        return view('auth.messaggi', compact('messaggi'));
    }

    public function store(Request $request)
    {
        $dati = $request->all();
        $nuovo_messaggio = new Message();
        $nuovo_messaggio->fill($dati);
        $nuovo_messaggio->save();
        return redirect()->back();
    }
}
