<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // Chamando os Seeders para criação via artisan
        $this->call([
            FinalidadeSeeder::class,
            ProximidadeSeeder::class,
            TipoSeeder::class
        ]);
    }
}
