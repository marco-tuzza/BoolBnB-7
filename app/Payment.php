<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'pagamenti';
    protected $fillable = ['id_utente', 'data_pagamento', 'esito'];

    public function users() {
        return $this->belongsTo('App\User');
    }
}
