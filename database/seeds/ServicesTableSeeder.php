<?php

use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sponsorships = [
            ['id' => 1, 'tipologia_sponsorizzazione' => '1 giorno'],
            ['id' => 2, 'tipologia_sponsorizzazione' => '3 giorni'],
            ['id' => 3, 'tipologia_sponsorizzazione' => '1 settimana'],
        ];
            DB::table('sponsorizzazioni')->insert($sponsorships);
    }
}
