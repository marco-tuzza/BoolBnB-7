<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sponsorship extends Model
{
    protected $table = 'appart_sponsor';
    protected $fillable = ['apartment_id', 'sponsorship_id', 'scadenza'];

}
