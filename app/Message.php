<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'messaggi';
    protected $fillable = ['id_appartamento', 'testo_messaggio', 'email_mittente', 'id_ricevente', 'data_invio'];
    public function apartments() {
        return $this->belongsTo('App\Apartment');
    }
}
