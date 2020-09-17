<?php

use Illuminate\Database\Seeder;
use App\User;
use Faker\Generator as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run(Faker $faker)
     {
        for ($i=0; $i < 100; $i++) {
            $nuovo_utente = new User();
            $nuovo_utente->email=$faker->unique()->email();
            $nuovo_utente->password=$faker->password();
            $nuovo_utente->nome=$faker->firstName(1);
            $nuovo_utente->cognome=$faker->lastName(1);
            $nuovo_utente->data_di_nascita=$faker->date();
            $nuovo_utente->save();

        }
     }
}
