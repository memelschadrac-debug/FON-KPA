<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Administrateur FON-KPA
        User::firstOrCreate(
            ['email' => 'admin@fon-kpa.ci'],
            [
                'name' => 'Administrateur FON-KPA',
                'password' => Hash::make('password'),
                'is_admin' => true,
                'email_verified_at' => now(),
            ]
        );

        // 2. Client de test
        User::firstOrCreate(
            ['email' => 'client@fon-kpa.ci'],
            [
                'name' => 'Kouamé Jean',
                'password' => Hash::make('password'),
                'is_admin' => false,
                'email_verified_at' => now(),
            ]
        );

        // 3. Catalogue FON-KPA
        $this->call(CatalogSeeder::class);
    }
}
