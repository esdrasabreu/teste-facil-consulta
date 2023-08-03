<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'specialty', 'city_id'];
    public $timestamps = true;

    // Relacionamento: um médico pertence a uma cidade
    public function city()
    {
        return $this->belongsTo(City::class);
    }
    // Relacionamento: um médico pode ter vários pacientes através da tabela intermediária doctor_patient
    public function patients()
    {
        return $this->belongsToMany(Patient::class, 'doctor_patient', 'doctor_id', 'patient_id')->withTimestamps();
    }
}
