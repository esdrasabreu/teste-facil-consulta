<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class DoctorPatientController extends Controller
{
    public function bindPatient(Request $request, $id_doctor)
    {
        $validator = Validator::make($request->all(), [
            'doctor_id' => 'required|exists:doctors,id',
            'patient_id' => 'required|exists:patients,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        if ($id_doctor != $request->doctor_id) {
            return response()->json(['message' => 'doctor_id and id_doctor not compatible'], 422);
        }

        $doctor = Doctor::find($id_doctor);
        
        if (!$doctor) {
            return response()->json(['message' => 'Doctor not found'], 404);
        }

        $patient_id = $request->input('patient_id');
        $patient = Patient::find($patient_id);
        if (!$patient) {
            return response()->json(['message' => 'Patient not found'], 404);
        }

        $doctor->patients()->attach($patient_id);
        // Retorna o médico e o paciente vinculados
        $response = [
            'message' => 'Patient linked to doctor successfully',
            'doctor' => $doctor,
            'patient' => $patient,
        ];

        return response()->json($response, 200);
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
