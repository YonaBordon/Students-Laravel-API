<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

//Creado con make:controller

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();

        return response()->json([
            'status' => 200,
            'students' => $students,
        ]);
    }

    public function getStudent($id)
    {
        $student = Student::find($id);
        return response()->json([
            'status' => 200,
            'student' => $student,
        ]);
    }

    public function updateStudent(Request $request, $id)
    {
        $student = Student::find($id);
        $student->name = $request->input('name');
        $student->course = $request->input('course');
        $student->email = $request->input('email');
        $student->phone = $request->input('phone');
        $student->update();

        return response()->json([
            'status' => 200,
            'message' => 'Student Updated Successfully',
        ]);
    }

    public function store(Request $request)
    {
        $student = new Student;
        $student->name = $request->input('name');
        $student->course = $request->input('course');
        $student->email = $request->input('email');
        $student->phone = $request->input('phone');
        $student->save();

        return response()->json([
            'status' => 200,
            'message' => 'Student Added Successfully',
        ]);
    }
}


//migrate crea la base de datos en mysql