<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'servizi_appartamento';

    public function apartments() {
        return $this->belongsToMany('App\Apartment');
    }
}
