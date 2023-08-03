<?php

namespace App\Http\Controllers;
use App\Http\Requests\PatientRequest;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patients = Patient::all();
        return response()->json($patients, 200);
    }

    public function update(Request $request, string $id_patient)
    {
        $patient = Patient::find($id_patient);
        if (!$patient) {
            return response()->json(['message' => 'Patient not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $patient->update($request->only('name', 'phone'));
        return response()->json($patient, 200);

    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'cpf' => 'required|string',
            'phone' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $patient = Patient::create($request->all());
        return response()->json($patient, 201);
    }



}
