<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorPatientController extends Controller
{
    public function bindPatient(Request $request, $id_doctor)
    {
        if ($id_doctor != $request->doctor_id) {
            return response()->json(['message' => 'doctor_id and id_doctor not compatible'], 422);
        }

        $doctor = Doctor::find($id_doctor);
        
        if (!$doctor) {
            return response()->json(['message' => 'Médico not found'], 404);
        }

        $patient_id = $request->input('patient_id');
        $patient = Doctor::find($patient_id);
        if (!$patient) {
            return response()->json(['message' => 'Doctor not found'], 404);
        }

        $doctor->patients()->attach($patient_id);
        return response()->json(['message' => 'Patient linked to doctor successfully'], 200);
    }

    public function listPatients($id_doctor)
    {
        $doctor = Doctor::find($id_doctor);
        if (!$doctor) {
            return response()->json(['message' => 'Doctor not found'], 404);
        }

        $patients = $doctor->patients;
        return response()->json($patients);
    }
}
