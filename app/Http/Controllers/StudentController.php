<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Department;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $query = Student::with('department');

        if ($request->search) {
            $query->where(
                'student_name',
                'like',
                '%' . $request->search . '%'
            );
        }

        $students = $query
            ->latest()
            ->paginate(10);

        return view(
            'students.index',
            compact('students')
        );
    }

    public function create()
    {
        $departments = Department::all();

        return view(
            'students.create',
            compact('departments')
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_name' => 'required',
            'email' => 'required',
            'gender' => 'required',
            'department_id' => 'required',
        ]);

        Student::create([
            'student_name' => $request->student_name,
            'email' => $request->email,
            'gender' => $request->gender,
            'enrollment_date' => $request->enrollment_date,
            'description' => $request->description,
            'department_id' => $request->department_id,
        ]);

        return redirect()
            ->route('students.index')
            ->with('success', 'Student Added');
    }

    public function edit(Student $student)
    {
        $departments = Department::all();

        return view(
            'students.edit',
            compact('student', 'departments')
        );
    }

    public function update(
        Request $request,
        Student $student
    )
    {
        $student->update([
            'student_name' => $request->student_name,
            'email' => $request->email,
            'gender' => $request->gender,
            'enrollment_date' => $request->enrollment_date,
            'description' => $request->description,
            'department_id' => $request->department_id,
        ]);

        return redirect()
            ->route('students.index')
            ->with('success', 'Updated');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()
            ->route('students.index')
            ->with('success', 'Deleted');
    }
}