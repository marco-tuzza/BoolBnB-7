<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Braintree;
use App\Payment;
use App\Apartment;
use App\Sponsorship;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use DB;

class PaymentController extends Controller
{
    public function index($id) {
        
        $gateway = new Braintree\Gateway([
            'environment' => 'sandbox',
            'merchantId' => 'wm73xwft4k7j8pwh',
            'publicKey' => '9s8g4x8y9k6y8d2g',
            'privateKey' => 'f9ff94f7e9b68a84cf8141c73fc50b10'
        ]);

        $appartamento = Apartment::find($id);
        $token = $gateway->ClientToken()->generate();
        if ($appartamento->id_proprietario == Auth::id()) {
            return view('auth.pagamenti', ['token' => $token, 'appartamento' => $appartamento]);
        } else {
            return back();
        }
        
    }

    public function checkout(Request $request) {
        $gateway = new Braintree\Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey')
        ]);
    
        $amount = $request->amount;
        $nonce = $request->payment_method_nonce;
    
        $result = $gateway->transaction()->sale([
            'amount' => $amount,
            'paymentMethodNonce' => $nonce,
            'customer' => [
                'firstName' => 'Tony',
                'lastName' => 'Stark',
                'email' => 'tony@avengers.com',
            ],
            'options' => [
                'submitForSettlement' => true
            ]
        ]);
    
        if ($result->success) {
            $transaction = $result->transaction;
            // header("Location: transaction.php?id=" . $transaction->id);
            
            $dati_pagamento = [
                "id_utente" => Auth::id(),
                "data_pagamento" => Carbon::now()->format('y-m-d'),
                "esito" => 'Pagamento Riuscito'
            ];
            
            $pagamenti = Payment::all();
            $pagamento = new Payment();
            $pagamento->fill($dati_pagamento);
            $pagamento->save();

            $appartamento_id = $request->appartamento_id;

            $check_sponsor = DB::select("SELECT * FROM `appart_sponsor` WHERE `apartment_id` = $appartamento_id ");
            if ($check_sponsor) {
                DB::select("DELETE FROM `appart_sponsor` WHERE `apartment_id` = $appartamento_id ");
            }
            $sponsorizzazione = new Sponsorship();
            
            if ($amount < 3) {
                $dati_sponsorizzazione = [
                    "apartment_id" => $appartamento_id,
                    "sponsor_type_id" => '1',
                    "scadenza" => Carbon::now()->add(1, 'day')->format('y-m-d')
                ];

                $sponsorizzazione->fill($dati_sponsorizzazione);
                $sponsorizzazione->save();
            } elseif ($amount < 6) {
                $dati_sponsorizzazione = [
                    "apartment_id" => $appartamento_id,
                    "sponsor_type_id" => '2',
                    "scadenza" => Carbon::now()->add(3, 'day')->format('y-m-d')
                ];

                $sponsorizzazione->fill($dati_sponsorizzazione);
                $sponsorizzazione->save();
            } else {
                $dati_sponsorizzazione = [
                    "apartment_id" => $appartamento_id,
                    "sponsor_type_id" => '3',
                    "scadenza" => Carbon::now()->add(6, 'day')->format('y-m-d')
                ];

                $sponsorizzazione->fill($dati_sponsorizzazione);
                $sponsorizzazione->save();
            };

            

            return back()->with('success_message', 'La tua transazione è andata a buon fine!');
            
        } else {
            $errorString = "";

            $dati_pagamento = [
                "id_utente" => Auth::id(),
                "data_pagamento" => Carbon::now()->format('y-m-d'),
                "esito" => 'Pagamento Fallito'
            ];
            $pagamento = new Payment();
            $pagamento->fill($dati_pagamento);
            $pagamento->save();
    
            foreach ($result->errors->deepAll() as $error) {
                $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
            }
    
            // $_SESSION["errors"] = $errorString;
            // header("Location: index.php");
            return back()->withErrors('An error occurred with the message: '.$result->message);
        }
    }
}
