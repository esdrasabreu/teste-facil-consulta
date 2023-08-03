<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctors = Doctor::all();
        return response()->json($doctors, 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'specialty' => 'required|string',
            'city_id' => 'required|integer|exists:cities,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        try {
            $doctor = Doctor::create($request->all());
            return response()->json($doctor, 201);
        } catch (\Exception $e) {
            // Tratar o erro de criação do médico, se necessário
            return response()->json(['error' => 'Error adding doctor'], 500);
        }
    }

    public function listDoctorsCity($id_city)
    {
        $doctors = Doctor::where('city_id', $id_city)->get();
        return response()->json($doctors, 200);
    }

}
