<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Berita',
            'slug' => 'berita',
        ]);
        Category::create([
            'name' => 'Info Penting',
            'slug' => 'info-penting',
        ]);
        Category::create([
            'name' => 'Warta Desa',
            'slug' => 'warta-desa',
        ]);
    }
}
