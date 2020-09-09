<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    protected $table = 'statistiche';
    protected $fillable = ['id_appartamento', 'data_visualizzazione', 'id_utente_visualizzazione', 'indirizzo_ip'];
    public function apartments() {
        return $this->belongsTo('App\Apartment');
    }
}
