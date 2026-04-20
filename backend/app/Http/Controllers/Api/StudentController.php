<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Student::with('course.college')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:100',
            'middle_name' => 'nullable|string|max:100',
            'last_name' => 'required|string|max:100',
            'suffix_name' => 'nullable|string|max:50',
            'gender' => 'required|in:M,F',
            'birth_date' => 'required|date',
            'email' => 'required|email|unique:students,email',
            'contact_number' => 'required|string|max:20',
            'course_id' => 'required|exists:courses,id',
        ]);

        return DB::transaction(function () use ($validated) {

            // 1. CREATE student
            $student = Student::create($validated);

            // 2. GENERATE student number using ID (BEST METHOD)
            $studentNumber = date('Y') . str_pad($student->id, 6, '0', STR_PAD_LEFT);

            // 3. UPDATE student
            $student->update([
                'student_number' => $studentNumber
            ]);

            return response()->json([
                'message' => 'Student created successfully',
                'data' => $student->load('course.college')
            ], 201);
        });
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Student::with('course.college')->find($id);

        if (!$student) {
            return response()->json([
                'message' => 'Student not found'
            ], 404);
        }

        return response()->json([
            'data' => $student
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $student = Student::find($id);

        if (!$student) {
            return response()->json([
                'message' => 'Student not found'
            ], 404);
        }

        $validated = $request->validate([
            'first_name' => 'sometimes|string|max:100',
            'middle_name' => 'nullable|string|max:100',
            'last_name' => 'sometimes|string|max:100',
            'suffix_name' => 'nullable|string|max:50',
            'gender' => 'sometimes|in:M,F',
            'birth_date' => 'sometimes|date',
            'email' => 'sometimes|email|unique:students,email,' . $id,
            'contact_number' => 'sometimes|string|max:20',
            'course_id' => 'sometimes|exists:courses,id',
        ]);

        $student->update($validated);

        return response()->json([
            'message' => 'Student updated successfully',
            'data' => $student->load('course.college')
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::find($id);

        if (!$student) {
            return response()->json([
                'message' => 'Student not found'
            ], 404);
        }

        $student->delete();

        return response()->json([
            'message' => 'Student deleted successfully'
        ]);
    }
}
