<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function store(Request $request)
    {
        $dati = $request->all();
        $nuovo_pagamento = new Payment();
        $nuovo_pagamento->fill($dati);
        $nuovo_pagamento->save();
        return redirect()->back();
    }
}
