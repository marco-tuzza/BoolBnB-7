<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Apartment;
use App\Service;
use App\Sponsorship;
use Carbon\Carbon;
use DB;

class ApartmentSearchController extends Controller
{
    public function index() {
        $appartamenti = Apartment::all();
        $array = [];
        foreach ($appartamenti as $appartamento) {
            $servizio = $appartamento->services;
            $sponsor = $appartamento->sponsorships;
            array_push($array, $appartamento);
        };
        return response()->json([
            'success' => true,
            'data' => [
                'appartamento' => $array,
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
            $sponsor_appartamento = $appartamento->sponsorships;
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

        $sponsor = [];
        $normali = [];

        foreach ($array as $value) {
            if (count($value->sponsorships) != 0) {
                array_push($sponsor, $value);
            } else {
                array_push($normali, $value);
            }
        }

        return response()->json([
            'success' => true,
            'data' => $normali,
            'sponsorizzati' => $sponsor,
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
            'sponsorizzati' => $array
        ]);
    }
}

