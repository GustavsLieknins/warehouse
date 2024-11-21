<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        DB::table('statuses')->insert([
            ['status' => 'Ordered'],
            ['status' => 'Available'],
        ]);

        DB::table('transactions')->insert([
            ['type' => 'Sale'],
            ['type' => 'Purchase'],
            ['type' => 'Restock']
        ]);

        DB::table('categories')->insert([
            ['name' => 'Furniture'],
            ['name' => 'Tech'],
            ['name' => 'Sports'],
            ['name' => 'Clothing'],
            ['name' => 'Tools'],
            ['name' => 'Car Parts'],
            ['name' => 'Jewelery'],
        ]);
    }
}

