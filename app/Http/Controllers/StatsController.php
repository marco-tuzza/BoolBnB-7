<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Apartment;
use Illuminate\Support\Facades\Auth;

class StatsController extends Controller
{
    public function index($id) {
        $appartamento = Apartment::find($id);
        if($appartamento->id_proprietario == Auth::id()) {
            return view('stats', compact('appartamento'));
        } else {
            return back();
        }
    }

}
