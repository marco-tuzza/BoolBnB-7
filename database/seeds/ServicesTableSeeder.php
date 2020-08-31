<?php

use Illuminate\Database\Seeder;
use App\Service;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $servizi = [
            ['id' => 1, 'titolo_servizio' => 'WiFi'],
            ['id' => 2, 'titolo_servizio' => 'Posto Macchina'],
            ['id' => 3, 'titolo_servizio' => 'Piscina'],
            ['id' => 4, 'titolo_servizio' => 'Portineria'],
            ['id' => 5, 'titolo_servizio' => 'Sauna'],
            ['id' => 6, 'titolo_servizio' => 'Vista Mare'],
        ];
        foreach ($servizi as $servizio) {
            Service::create($servizio);
        }
    }
}
