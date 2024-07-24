<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(100)->create();

        User::factory()->create([
            'name' => 'Phạm Văn A',
            'email' => 'APhamV@example.com',
            'password' => 'aphamvan'
        ]);
        // gọi tới ProductCatalogueSeeder
        $this->call([
            ProductCatalogueSeeder::class
        ]);
    }
}
