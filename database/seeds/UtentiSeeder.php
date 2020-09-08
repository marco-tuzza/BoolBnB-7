<?php

use Illuminate\Database\Seeder;
use App\User;
use Faker\Generator as Faker;

class UtentiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 100; $i++) { 
            $nuovoUtente = new User();
            $nuovoUtente->email = $faker->unique()->email;
            $nuovoUtente->password = $faker->password;
            $nuovoUtente->nome = $faker->firstName;
            $nuovoUtente->cognome = $faker->lastName;
            $nuovoUtente->data_di_nascita = $faker->dateTimeBetween($startDate = '-30 years', $endDate = '-18 years', $timezone = null);
            $nuovoUtente->save();
        }
    }
}
