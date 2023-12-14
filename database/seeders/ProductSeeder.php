<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'title' => 'ancillae vituperata tation adipisci enim mutat eirmod maximus rutrum expetenda',
            'price' => 19.4,
            'quantity' => 3,
            'category_id' => 1,
            'brand_id' => 1,
            'description' => 'Intellegatinimicus semper deterruisset tale curabitur tempor penatibus atqui potenti fusce.  Viverramaiorum solet fabulas posse augue.  Maiestatistaciti similique lacus eget fuisset urbanitas.'
        ]);
    }
}
