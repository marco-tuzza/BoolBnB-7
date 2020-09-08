<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Apartment;

class ApartmentSearchController extends Controller
{
    public function index() {
        $appartamenti = Apartment::all();
        return response()->json([
            'success' => true,
            'data' => $appartamenti,
            'count' => $appartamenti->count()
        ]);
    }

    public function search($lat, $lon) {
        $array = [];
        $appartamenti = Apartment::all()->where('latitudine', '>', $lat - 0.5)->where('latitudine', '<', $lat + 0.5)->where('longitudine', '>', $lon - 0.5)->where('longitudine', '<', $lon + 0.5);
        foreach ($appartamenti as $appartamento) {
            array_push($array, $appartamento);
        };
        return response()->json([
            'success' => true,
            'data' => $array,
            'count' => $appartamenti->count()
        ]);
    }
}

