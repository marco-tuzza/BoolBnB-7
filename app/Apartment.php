<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    protected $table = 'appartamenti';
    protected $fillable = ['titolo_appartamento', 'numero_stanze', 'numero_letti', 'numero_bagni', 'metri_quadri', 'id_proprietario', 'latitudine', 'longitudine', 'immagine_appartamento'];
}
