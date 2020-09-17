<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Apartment;

class StatsController extends Controller
{
    public function index($id) {
        $appartamento = Apartment::find($id);
        return view('stats', compact('appartamento'));
    }

}
