<?php

namespace Database\Seeders;

use App\Models\Marital;
use Illuminate\Database\Seeder;

class MaritalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Marital::create([
            'marital_name' => 'Belum Kawin',
        ]);
        Marital::create([
            'marital_name' => 'Kawin',
        ]);
        Marital::create([
            'marital_name' => 'Cerai Hidup',
        ]);
        Marital::create([
            'marital_name' => 'Cerai Mati',
        ]);
    }
}
