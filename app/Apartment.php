<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    protected $table = 'appartamenti';
    protected $fillable = ['id_proprietario', 'titolo_appartamento', 'descrizione', 'numero_stanze', 'numero_letti', 'numero_bagni', 'metri_quadri', 'latitudine', 'longitudine', 'immagine_appartamento'];

    public function users() {
        return $this->belongsTo('App\User');
    }

    public function messages() {
        return $this->hasMany('App\Message');
    }

    public function statistics() {
        return $this->hasMany('App\Statistic');
    }

    public function sponsorships() {
        return $this->belongsToMany('App\Sponsorship', 'appartamenti_sponsorizzazioni');
    }

    public function services() {
        return $this->belongsToMany('App\Service', 'appartamenti_servizi');
    }
}
