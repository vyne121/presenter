<?php

namespace Database\Factories;

use App\Models\Contribution;
use App\Models\Present;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContributionFactory extends Factory
{
    protected $model = Contribution::class;

    public function definition(): array
    {
        $present = Present::inRandomOrder()->first() ?? Present::factory()->create();
        $user    = User::inRandomOrder()->first() ?? User::factory()->create();
        $price  = $present->price ?? 10000;
        $amount = $this->faker->numberBetween(1000, (int) max(1000, $price * 0.8));

        return [
            'user_id'    => $user->id,
            'present_id' => $present->id,
            'amount'     => $amount,
        ];
    }
}

