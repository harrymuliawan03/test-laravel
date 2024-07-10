<?php

namespace Database\Factories;

use App\Models\Machine;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class MachineFactory extends Factory
{
    protected $model = Machine::class;

    public function definition()
    {
        return [
            'mesin_id' => $this->faker->unique()->numerify('MESIN-###'),
            'site' => $this->faker->word,
            'month' => $this->faker->monthName,
            'status' => $this->faker->randomElement(['active', 'inactive']),
            'location' => $this->faker->city,
            'operator' => $this->faker->name,
        ];
    }
}
