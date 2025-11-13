<?php

namespace Database\Seeders;

use App\Models\Contribution;
use App\Models\Present;
use App\Models\User;
use Illuminate\Database\Seeder;

class ContributionSeeder extends Seeder
{
    public function run(): void
    {
        $presents = Present::all();
        $users    = User::all();

        if ($presents->isEmpty() || $users->isEmpty()) {
            return;
        }

        foreach ($presents as $present) {
            // how many people contribute to this present (0–3)
            $contributorCount = rand(0, min(3, $users->count()));

            // pick N UNIQUE users for this present
            $contributors = $users->random($contributorCount);

            foreach ($contributors as $user) {
                Contribution::factory()->create([
                    'present_id' => $present->id,
                    'user_id'    => $user->id,
                ]);
            }
        }
    }
}


