<?php

namespace Database\Seeders;

use App\Models\Bloodtype;
use Illuminate\Database\Seeder;

class BloodtypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bloodtype::create([
            'bloodtype_name' => 'A',
        ]);
        Bloodtype::create([
            'bloodtype_name' => 'B',
        ]);
        Bloodtype::create([
            'bloodtype_name' => 'AB',
        ]);
        Bloodtype::create([
            'bloodtype_name' => 'O',
        ]);
        Bloodtype::create([
            'bloodtype_name' => 'A+',
        ]);
        Bloodtype::create([
            'bloodtype_name' => 'A-',
        ]);
        Bloodtype::create([
            'bloodtype_name' => 'B+',
        ]);
        Bloodtype::create([
            'bloodtype_name' => 'B-',
        ]);
        Bloodtype::create([
            'bloodtype_name' => 'AB+',
        ]);
        Bloodtype::create([
            'bloodtype_name' => 'AB-',
        ]);
        Bloodtype::create([
            'bloodtype_name' => 'O+',
        ]);
        Bloodtype::create([
            'bloodtype_name' => 'O-',
        ]);
        Bloodtype::create([
            'bloodtype_name' => 'Tidak Tahu',
        ]);
    }
}
