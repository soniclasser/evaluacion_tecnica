momkjjkj<?php

use Illuminate\Database\Seeder;
use App\Producto;

class ProductoSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = [
            'refrescos',
            'papas',
            'dulces',
            'pan',
            'queso',
            'jabon',
            'fruta',
            'leche',
            'huevo',
            'yoghur'
        ];

        foreach ($faker as $name) {
            Producto::create(['nombre' => $name,'precio' => mt_rand(10,100)]);
        }
    }
}
