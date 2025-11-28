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
     * Seed the application"s database.
     */
    public function run(): void
    {
        User::factory(2)->create();

        User::factory()->create([
            "name" => "Admin",
            "username" => "administrator",
            "email" => "admin@gmail.com",
            "password" => Hash::make("password"),
            "country" => "US",
            "role" => User::ROLE_ADMIN,
        ]);

        $this->call([AlbumSeeder::class, CategoriesTableSeeder::class, ProductSeeder::class]);
    }
    
}
