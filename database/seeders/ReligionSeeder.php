<?php

namespace Database\Seeders;

use App\Models\Religion;
use Illuminate\Database\Seeder;

class ReligionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Religion::create([
            'religion_name' => 'Islam',
        ]);
        Religion::create([
            'religion_name' => 'Kristen',
        ]);
        Religion::create([
            'religion_name' => 'Katholik',
        ]);
        Religion::create([
            'religion_name' => 'Hindu',
        ]);
        Religion::create([
            'religion_name' => 'Budha',
        ]);
        Religion::create([
            'religion_name' => 'Kong Hucu',
        ]);
        Religion::create([
            'religion_name' => 'Kepercayaan Terhadap Tuhan Yang Maha Esa',
        ]);
    }
}
