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

    public function search(Request $data) {
        $array = [];
        $servizi = $data->servizi;
        $appartamenti = Apartment::all()->where('latitudine', '>', $data->lat - 0.5)->where('latitudine', '<', $data->lat + 0.5)->where('longitudine', '>', $data->lon - 0.5)->where('longitudine', '<', $data->lon + 0.5)->where('numero_stanze', '>=', $data->stanze)->where('numero_letti', '>=', $data->letti);
        foreach ($appartamenti as $appartamento) {
            $servizi_appartamento = $appartamento->services;
            $servizi_ceck = [];
            if ($servizi) {
                foreach ($servizi_appartamento as $servizio) {
                    if (in_array($servizio->id, $servizi)) {
                        array_push($servizi_ceck, $servizio->id);
                    }
                };
                $containsAllValues = !array_diff($servizi, $servizi_ceck);
                if ($containsAllValues) {
                    array_push($array, $appartamento);
                }
            } else {
                array_push($array, $appartamento);
            }
        };
        return response()->json([
            'success' => true,
            'data' => $array,
            'count' => $appartamenti->count()
        ]);
    }
}

