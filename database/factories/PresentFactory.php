<?php

namespace Database\Factories;

use App\Models\Present;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/** @extends Factory<\App\Models\Present> */
class PresentFactory extends Factory
{
    protected $model = Present::class;

    public function definition(): array
    {
        return [
            'name'    => $this->faker->words(3, true),
            'link'    => $this->faker->optional(0.7)->url(),
            'price'   => $this->faker->optional(0.85)->randomFloat(2, 1000, 35000),
            'user_id' => User::whereIn('id', [1, 2, 3, 4, 5])->inRandomOrder()->value('id') ?? 1,
            'description' => $this->faker->optional(0.9)->sentence(),
        ];
    }

    /**
     * Assign a specific existing user explicitly.
     */
    public function forUser(User $user): self
    {
        return $this->state(fn () => ['user_id' => $user->id]);
    }
}
