<?php

namespace Database\Factories;

use App\Models\Type;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Testing\Fakes\Fake;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
{
    static $typeIds = null;
    static $userIds = null;

    $typeIds ??= \App\Models\Type::pluck('id');
    $userIds ??= \App\Models\User::pluck('id');

    $types = ['Apartment', 'HMO', 'House', 'Villa', 'Office'];

    return [
        'name' => fake()->name(),
        'type' => fake()->randomElement($types),
        'type_id' => $typeIds->random(),
        'owner_id' => User::inRandomOrder()->first()->id,
        'monthly_payment' => fake()->numberBetween(100, 10000),
        'rent' => fake()->numberBetween(100, 10000),
        'rent_frequency' => fake()->randomElement(['daily', 'weekly', 'monthly', 'yearly']),
        'available_from' => fake()->dateTimeBetween('now', '+2 years'),
        'address' => fake()->address(),
        'meta' => null,
        'created_by' => $userIds->random(),
    ];
}
}
