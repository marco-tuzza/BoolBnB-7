<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use Auth;

class MessageController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $messaggi = Message::All()->where('id_ricevente', $userId);
        return view('auth.messaggi', compact('messaggi'));
    }
}
