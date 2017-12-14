<?php

use Illuminate\Database\Seeder;
use App\Tienda;
use Faker\Factory;

class TiendaSeed extends Seeder
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
            Tienda::create(['nombre' => $faker->company]);
        }
    }
}
