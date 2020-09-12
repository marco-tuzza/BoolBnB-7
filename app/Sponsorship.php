<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sponsorship extends Model
{
    protected $table = 'sponsorizzazioni';
    protected $fillable = ['id_pagamento', 'tipologia_sponsorizzazione'];

    public function apartments() {
        return $this->belongsToMany('App\Apartment');
    }

    public function payments() {
        return $this->belongsTo('App\Payment');
    }
}
