<?php

namespace Database\Factories;

use App\Models\DoctorPatient;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class DoctorPatientFactory extends Factory
{
    protected $model = DoctorPatient::class;

    public function definition()
    {
        return [
            'doctor_id' => function () {
                return \App\Models\Doctor::factory()->create()->id;
            },
            'patient_id' => function () {
                return \App\Models\Patient::factory()->create()->id;
            },
        ];
    }
}
