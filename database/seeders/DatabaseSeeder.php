<?php

namespace Database\Seeders;

use App\Models\Cinema;
use App\Models\Movie;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Lê Tuấn',
        //     'email' => 'tuanlehuu1608@gmail.com',
        //     'password' => Hash::make('Letuan99@'),
        //     'role_id' => 1,
        // ]);

        $movie = Movie::factory()->create();
        $cinemas = Cinema::factory(50)->create();
        foreach ($cinemas as $cinema) {
            $cinema->movies()->attach([
                'cinema_id' => $cinema->id,
                'movie_id' => $movie->id,
            ]);
        }
    }
}
