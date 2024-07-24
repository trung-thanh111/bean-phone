<?php

namespace Database\Seeders;

use App\Models\ProductCatalogue;
use Illuminate\Database\Seeder;

class ProductCatalogueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ProductCatalogues là tên class Factory
        // tạo số bản ghi 
        ProductCatalogue::factory()
            ->count(100)
            ->create();
    }
}
