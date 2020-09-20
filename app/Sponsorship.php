<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sponsorship extends Model
{
    protected $table = 'appartamenti_sponsorizzazioni';
    protected $fillable = ['apartment_id', 'sponsorship_id', 'scadenza'];
    
}
