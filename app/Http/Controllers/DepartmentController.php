<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::latest()->get();

        return view(
            'departments.index',
            compact('departments')
        );
    }

    public function create()
    {
        return view('departments.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'dept_name' => 'required'
        ]);

        Department::create([
            'dept_name' => $request->dept_name,
            'manager_name' => $request->manager_name,
            'location' => $request->location,
        ]);

        return redirect()
            ->route('departments.index')
            ->with('success', 'Department Created');
    }

    public function edit(Department $department)
    {
        return view(
            'departments.edit',
            compact('department')
        );
    }

    public function update(
        Request $request,
        Department $department
    )
    {
        $request->validate([
            'dept_name' => 'required'
        ]);

        $department->update([
            'dept_name' => $request->dept_name,
            'manager_name' => $request->manager_name,
            'location' => $request->location,
        ]);

        return redirect()
            ->route('departments.index')
            ->with('success', 'Updated Successfully');
    }

    public function destroy(Department $department)
    {
        $department->delete();

        return redirect()
            ->route('departments.index')
            ->with('success', 'Deleted Successfully');
    }
}