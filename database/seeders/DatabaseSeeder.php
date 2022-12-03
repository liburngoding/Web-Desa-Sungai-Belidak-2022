<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\GenderSeeder;
use Database\Seeders\MaritalSeeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\ReligionSeeder;
use Database\Seeders\BloodtypeSeeder;
use Database\Seeders\EducationSeeder;
use Database\Seeders\ProfessionSeeder;
use Database\Seeders\FamilyrelationSeeder;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
          $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            ReligionSeeder::class,
            GenderSeeder::class,
            ProfessionSeeder::class,
            BloodtypeSeeder::class,
            EducationSeeder::class,
            MaritalSeeder::class,
            FamilyrelationSeeder::class,
        ]);
    }
}
