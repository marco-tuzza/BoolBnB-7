<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Apartment;
use App\Message;
use App\Service;
class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get the currently authenticated user's ID...
        $id = Auth::id();
        $appartamenti = Apartment::all()->where('id_proprietario', $id);
        return view('dashboard', compact('appartamenti'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $servizi = Service::All();
        $data = [
            'servizi' => $servizi
        ];
        return view('auth.apartment.create', $data);
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
        $servizi = Service::All();
        $nuovo_appartamento->fill($dati);
        $nuovo_appartamento->save();
        if (!empty($dati['servizi'])) {
            $nuovo_appartamento->services()->sync($dati['servizi']);
        } else {
            $nuovo_appartamento->services()->detach();
        }
        $id = Auth::id();
        $appartamenti = Apartment::all()->where('user_id', $id);
        return view('welcome', compact('appartamenti'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $servizi = Service::all();
        $appartamento = Apartment::find($id);
        $userId = Auth::id();
        $messaggi = Message::All()->where('id_ricevente', $userId);
        $data = [
            'servizi' => $servizi,
            'appartamento' => $appartamento,
            'messaggi' => $messaggi
        ];
        return view('caratteristiche', $data);
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
        $servizi = Service::all();
        $data = [
            'servizi' => $servizi,
            'appartamento' => $appartamento
        ];
        if($appartamento) {
            return view('auth.apartment.edit', $data);
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
        $servizi = Service::All();
        $appartamento->update($dati);
        if($appartamento) {
            if (!empty($dati['servizi'])) {
                $appartamento->services()->sync($dati['servizi']);
            } else {
                $appartamento->services()->detach();
            }
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
        $messaggi = Message::where('id_appartamento', $id);
        if($appartamento) {
            $appartamento->services()->detach();
            $messaggi->delete();
            $appartamento->delete();
            return redirect()->route('apartment.index');
        } else {
            return abort('404');
        }
    }
}