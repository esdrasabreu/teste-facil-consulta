<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorPatient extends Model
{
    use HasFactory;
    protected $table = 'doctor_patient';
    protected $fillable = ['doctor_id', 'patient_id'];

    
    public $timestamps = true;

    // Relacionamento: um registro doctor_patient pertence a um médico
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    // Relacionamento: um registro doctor_patient pertence a um paciente
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
