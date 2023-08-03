<?php

namespace Database\Factories;

use App\Models\Doctor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Doctor>
 */
class DoctorFactory extends Factory
{
    protected $model = Doctor::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'specialty' => $this->faker->randomElement(['Cardiologista', 'Clínico Geral', 'Dermatologista', 'Pediatra', 'Oftalmologista']),
            'city_id' => function () {
                return \App\Models\City::factory()->create()->id;
            },
        ];
    }
}
