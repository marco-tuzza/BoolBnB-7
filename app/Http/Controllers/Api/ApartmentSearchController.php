<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Apartment;
use App\Service;
use Carbon\Carbon;
use DB;

class ApartmentSearchController extends Controller
{
    public function index() {
        $appartamenti = Apartment::all();
        $array = [];
        $arrayServizi = [];
        $arraySponsor = [];
        foreach ($appartamenti as $appartamento) {
            $servizio = $appartamento->services;
            $sponsorizzazioni = $appartamento->sponsorships;
            if ($servizio) {
                array_push($arrayServizi, $servizio);
            }
            if ($sponsorizzazioni) {
                foreach ($sponsorizzazioni as $sponsorizzazione) {
                    array_push($arraySponsor, $sponsorizzazione->pivot);
                }
            }
            array_push($array, $appartamento);
        };
        return response()->json([
            'success' => true,
            'data' => [
                'appartamento' => $array,
                'servizi' => $arrayServizi,
                'sponsorizzazioni' => $arraySponsor
            ],
            'count' => $appartamenti->count()
        ]);
    }

    public function search(Request $data) {
        $array = [];
        $servizi = $data->servizi;
        $appartamenti = Apartment::all()->where('latitudine', '>', $data->lat - $data->distanza)->where('latitudine', '<', $data->lat + $data->distanza)->where('longitudine', '>', $data->lon - $data->distanza)->where('longitudine', '<', $data->lon + $data->distanza)->where('numero_stanze', '>=', $data->stanze)->where('numero_letti', '>=', $data->letti);
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
            'cache' => false,
            'count' => $appartamenti->count()
        ]);
    }

    public function sponsorizzati() {

        
        $sponsorizzazioni = DB::select("SELECT * FROM `appart_sponsor` WHERE `scadenza` > CURDATE()");
        $sponsor = [];
        $array = [];
        foreach ($sponsorizzazioni as $sponsorizzazione) {
            $id = $sponsorizzazione->apartment_id;
            array_push($sponsor, $id);
        }
        $appartamenti = Apartment::all();
        foreach ($appartamenti as $appartamento) {
           if (in_array($appartamento->id, $sponsor)) {
            array_push($array, $appartamento);
           }
        };
        return response()->json([
            'success' => true,
            'data' => [
                'sponsorizzati' => $array
            ],
        ]);
    }
}

