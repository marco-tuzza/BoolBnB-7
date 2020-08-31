<?php

use Illuminate\Database\Seeder;
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
            DB::table('utenti')->insert([
                // $nuovo_utente = new User();
                'email'=>$faker->unique()->email (),
                'password'=>$faker->password(),
                'nome'=>$faker->sentence(1),
                'cognome'=>$faker->sentence(1),
                'data_di_nascita'=>$faker->date(),
                // $nuovo_utente->save();
            ]);
        }
     }
}
