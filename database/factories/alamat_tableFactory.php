<?php

namespace Database\Factories;

use App\Models\alamat;
use App\Models\kawasan;
use App\Models\pondok;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\alamat_table>
 */
class alamat_tableFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>fake()->name(),
            'alamat_id'=>alamat::all()->random()->id,
            'alamattable_id'=>fake()->randomElement([
                'pondok_id'=>pondok::all()->random()->id,
                'kawasan_id'=>kawasan::all()->random()->id,
                'user_id'=>User::all()->random()->id,
            ]),
            'alamattable_type' =>fake()->randomElement([
                pondok::class,
                User::class,
                kawasan::class,
            ]),
        ];
    }
}
