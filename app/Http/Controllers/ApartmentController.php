<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Apartment;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appartamenti = Apartment::all();
        return view('auth.apartment.index', compact('appartamenti'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.apartment.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Bisogna aggiungere le validazioni
        $dati = $request->all();
        $nuovo_appartamento = new Apartment();
        $nuovo_appartamento->fill($dati);
        $nuovo_appartamento->save();
        return redirect()->route('apartment.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $appartamento = Apartment::find($id);
        return view('auth.apartment.show', compact('appartamento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $appartamento = Apartment::find($id);
        if($appartamento) {
            return view('auth.apartment.edit', compact('appartamento'));
        }
        return abort('404');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'titolo_appartamento' => 'required|max:255',
            'id_proprietario' => 'required|numeric',
            'numero_stanze' => 'required|numeric',
            'numero_letti' => 'required|numeric',
            'numero_bagni' => 'required|numeric',
            'metri_quadri' => 'required|numeric',
            'latitudine' => 'required|numeric',
            'longitudine' => 'required|numeric',
            'immagine_appartamento' => 'required|url'
        ]);
        $dati = $request->all();
        $appartamento = Apartment::find($id);
        if($appartamento) {
            $appartamento->update($dati);
        }
        return redirect()->route('apartment.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $appartamento = Apartment::find($id);
        if($appartamento) {
            $appartamento->delete();
            return redirect()->route('apartment.index');
        } else {
            return abort('404');
        }
    }
}