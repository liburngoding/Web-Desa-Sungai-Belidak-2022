<?php

namespace Database\Seeders;

use App\Models\Education;
use Illuminate\Database\Seeder;

class EducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Education::create([
            'education_name' => 'Tidak/Belum Sekolah',
        ]);
        Education::create([
            'education_name' => 'Belum Tamat SD/Sederajat',
        ]);
        Education::create([
            'education_name' => 'Tamat SD/Sederajat',
        ]);
        Education::create([
            'education_name' => 'SLTP/Sederajat',
        ]);
        Education::create([
            'education_name' => 'SLTA/Sederajat',
        ]);
        Education::create([
            'education_name' => 'Diploma I/II',
        ]);
        Education::create([
            'education_name' => 'Akademi/Diploma III/Sarjana Muda',
        ]);
        Education::create([
            'education_name' => 'Diploma IV/Strata I',
        ]);
        Education::create([
            'education_name' => 'Strata II',
        ]);
        Education::create([
            'education_name' => 'Strata III',
        ]);
    }
}
