<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        if ($student) {
            return response()->json([
                'status' => 200,
                'student' => $student,
            ]);
        } else {

            return response()->json([
                'status' => 404,
                'message' => 'No Student ID Found',
            ]);
        }
    }

    public function addStudent(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'name' => 'required|max:191',
            'course' => 'required|max:191',
            'email' => 'required|email|max:191',
            'phone' => 'required|max:10|min:10',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ]);
        } else {

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

    public function updateStudent(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:191',
            'course' => 'required|max:191',
            'email' => 'required|email|max:191',
            'phone' => 'required|max:10|min:10',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ]);
            
        } else {
            $student = Student::find($id);

            if ($student) {


                $student->name = $request->input('name');
                $student->course = $request->input('course');
                $student->email = $request->input('email');
                $student->phone = $request->input('phone');
                $student->update();

                return response()->json([
                    'status' => 200,
                    'message' => 'Student Updated Successfully',
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'No Student ID Found',
                ]);
            }
        }
    }

    public function deleteStudent($id)
    {
        $student = Student::find($id);
        $student->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Student Deleted Sucessfully',
        ]);
    }
}


//migrate crea la base de datos en mysql