<?php

use Illuminate\Database\Seeder;
use App\Sponsorship;

class SponsorshipsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sponsorizzazioni = [
            ['id' => 1, 'tipologia_sponsorizzazione' => '1 giorno'],
            ['id' => 2, 'tipologia_sponsorizzazione' => '3 giorni'],
            ['id' => 3, 'tipologia_sponsorizzazione' => '1 settimana'],
        ];
        foreach ($sponsorizzazioni as $sponsorizzazione) {
            Sponsorship::create($sponsorizzazione);
        }
    }
}
