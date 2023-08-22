<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();

        return view('index', ['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|unique:students,name',
            'email' => 'required|email',
            'sex' => 'required|string',
            'age' => 'required|numeric'
        ]);


        if(Student::create($data)){
            return redirect() -> route('student.index')->with('msg', 'Student created successfully');
        }

        return redirect() -> back() -> with('msg', 'Student creation failed');
    }

    public function edit(Student $student)
    {
        return view('edit', ['student' => $student]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'sex' => 'required|string',
            'age' => 'required|numeric'
        ]);

        if($student -> update($data)){
            return redirect()->route('student.index')->with('msg', 'Student updated successfully');
        }
        return redirect()->route('student.index')->with('msg', 'Student update failed');

    }

    public function show(Student $student){

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {

        if($student->delete()){
            return response()->json([
                'success' => true,
                'route_link' => route('student.index'),
                'message' => 'Student deleted successfully'
            ], 200);
        }

        return response()->json([
            'success' => false,
            'route_link' => route('student.index'),
            'message' => 'Student delete failed'
        ], 404);
    }
}
