<?php

use Illuminate\Database\Seeder;
use App\User;
use Faker\Generator as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
        $nuovoUtente = new User();
        $nuovoUtente->email = 'prova@gmail.com';
        $nuovoUtente->password = 'ABCdfg123';
        $nuovoUtente->save();
    }
}
