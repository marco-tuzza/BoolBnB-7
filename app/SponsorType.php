<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SponsorType extends Model
{
    protected $table = 'sponsorizzazioni';
    protected $fillable = ['id', 'tipologia_sponsorizzazione',];

    public function apartments() {
        return $this->belongsToMany('App\Apartment' , 'appart_sponsor');
    }

}
