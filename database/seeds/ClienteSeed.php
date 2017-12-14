<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Cliente;

class ClienteSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        for ($i=0; $i < 10; $i++) {
            Cliente::create(['nombre' => $faker->name]);
        }
    }
}
