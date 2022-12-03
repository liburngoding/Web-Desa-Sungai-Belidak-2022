<?php

namespace Database\Seeders;

use App\Models\Familyrelation;
use Illuminate\Database\Seeder;

class FamilyrelationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Familyrelation::create([
            'familyrelation_name' => 'Kepala Keluarga'
        ]);
        Familyrelation::create([
            'familyrelation_name' => 'Suami'
        ]);
        Familyrelation::create([
            'familyrelation_name' => 'Istri'
        ]);
        Familyrelation::create([
            'familyrelation_name' => 'Anak'
        ]);
        Familyrelation::create([
            'familyrelation_name' => 'Menantu'
        ]);
        Familyrelation::create([
            'familyrelation_name' => 'Cucu'
        ]);
        Familyrelation::create([
            'familyrelation_name' => 'Orang Tua'
        ]);
        Familyrelation::create([
            'familyrelation_name' => 'Mertua'
        ]);
        Familyrelation::create([
            'familyrelation_name' => 'Famili Lain'
        ]);
        Familyrelation::create([
            'familyrelation_name' => 'Pembantu'
        ]);
        Familyrelation::create([
            'familyrelation_name' => 'Lainnya'
        ]);
    }
}
