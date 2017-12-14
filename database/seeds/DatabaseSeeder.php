<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(ClienteSeed::class);
        $this->call(TiendaSeed::class);
        $this->call(ProductoSeed::class);
        $this->call(VentaSeed::class);
        $this->call(DetalleSeed::class);
    }
}
