<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Ádám, Miri és Ida',
            'email' => 'miridam@presenter.hu',
            'admin' => true,
        ]);
        User::factory()->create([
            'name' => 'Anya, Apa és Mama',
            'email' => 'apanyama@presenter.hu',
        ]);
        User::factory()->create([
            'name' => 'Dia és Tomi',
            'email' => 'dimas@presenter.hu',
        ]);
        User::factory()->create([
            'name' => 'Martin és Vera',
            'email' => 'marver@presenter.hu',
        ]);
        User::factory()->create([
            'name' => 'Gábor',
            'email' => 'gaboci@presenter.hu',
        ]);

        $this->call([
            PresentSeeder::class,
            ContributionSeeder::class,
        ]);
    }
}
