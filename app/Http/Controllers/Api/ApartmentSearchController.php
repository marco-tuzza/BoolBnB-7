<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Apartment;
use App\Service;

class ApartmentSearchController extends Controller
{
    public function index() {
        $appartamenti = Apartment::all();
        $array = [];
        $arrayServizi = [];
        foreach ($appartamenti as $appartamento) {
            $servizio = $appartamento->services;
            array_push($arrayServizi, $servizio);
            array_push($array, $appartamento);
        };
        return response()->json([
            'success' => true,
            'data' => [
                'appartamento' => $array,
                'servizi' => $arrayServizi
            ],
            'count' => $appartamenti->count()
        ]);
    }

    public function search($lat, $lon) {
        $array = [];
        $appartamenti = Apartment::all()->where('latitudine', '>', $lat - 0.5)->where('latitudine', '<', $lat + 0.5)->where('longitudine', '>', $lon - 0.5)->where('longitudine', '<', $lon + 0.5);
        foreach ($appartamenti as $appartamento) {
            $servizio = $appartamento->services;
            array_push($appartamento, $servizio);
        };
        return response()->json([
            'success' => true,
            'data' => $array,
            'count' => $appartamenti->count()
        ]);
    }
}

