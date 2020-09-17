<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Statistic;
use App\Message;

class StatisticheController extends Controller
{
    public function index($id) {
        $statistiche = Statistic::all()->where('id_appartamento', $id);
        $messaggi = Message::all()->where('id_appartamento', $id);
        return response()->json([
            'success' => true,
            'data' => [
                'statistiche' => $statistiche,
                'messaggi' => $messaggi
            ],
            'count_statistiche' => $statistiche->count(),
            'count_messaggi' => $messaggi->count()
        ]);
    }
}
