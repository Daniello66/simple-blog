<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Sembrar datos.
     *
     * @return void
     * @author Daniel Beltrán
     */
    public function run(): void {
        $items = [
            'Deportes',
            'Entretenimiento',
            'Economía',
            'Salud',
            'Tecnología',
            'Moda',
            'Arte',
            'Gastronomía',
            'Viajes',
            'Ciencia'
        ];

        foreach ($items as $item) {
            Category::create(['name' => $item]);
        }
    }
}
