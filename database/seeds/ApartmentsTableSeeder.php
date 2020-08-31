<?php

use Illuminate\Database\Seeder;
use App\Apartment;
use Faker\Generator as Faker;

class ApartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 100; $i++) {
            $nuovo_appartamento = new Apartment();
            $nuovo_appartamento->titolo_appartamento=$faker->sentence($nbWords = 3);
            $nuovo_appartamento->numero_stanze=$faker->randomDigitNot(0);
            $nuovo_appartamento->numero_letti=$faker->randomDigitNot(0);
            $nuovo_appartamento->numero_bagni=$faker->randomDigitNot(0);
            $nuovo_appartamento->metri_quadri=$faker->numberBetween($min = 50, $max = 300);
            $nuovo_appartamento->latitudine=$faker->latitude($min = -90, $max = 90);
            $nuovo_appartamento->longitudine=$faker->longitude($min = -180, $max = 180);
            $nuovo_appartamento->immagine_appartamento=$faker->imageUrl($width = 640, $height = 480);
            $nuovo_appartamento->save();

        }
    }
}
