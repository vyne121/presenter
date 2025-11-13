<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Present;
use App\Models\User;

class PresentSeeder extends Seeder
{
    public function run(): void
    {
        Present::factory()->count(20)->create();
    }
}
