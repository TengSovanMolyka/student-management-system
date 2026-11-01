@extends('layouts.app')
@section('title', 'Dashboard')
@section('page-title', 'Dashboard')
@section('content')

@php
    $totalStudents = \App\Models\Student::count();
    $totalDepartments = \App\Models\Department::count();
    $recentStudents = \App\Models\Student::with('department')
        ->latest()
        ->take(5)
        ->get();
@endphp

<div class="page-heading">
    <h2>Welcome to your Dashboard</h2>
    <p>Manage your students and departments from one place.</p>
</div>

<div class="row g-4 mb-4">

    <div class="col-md-6">
        <div class="card stat-card">
            <div class="stat-icon rose">
                <i class="bi bi-people-fill"></i>
            </div>

            <div class="stat-label">Total Students</div>
            <h2 class="stat-number">{{ $totalStudents }}</h2>

            <a href="{{ route('students.index') }}" class="stat-link">
                View all students
                <i class="bi bi-arrow-right"></i>
            </a>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card stat-card">
            <div class="stat-icon plum">
                <i class="bi bi-building"></i>
            </div>

            <div class="stat-label">Total Departments</div>
            <h2 class="stat-number">{{ $totalDepartments }}</h2>

            <a href="{{ route('departments.index') }}" class="stat-link">
                View all departments
                <i class="bi bi-arrow-right"></i>
            </a>
        </div>
    </div>

</div>

<div class="row g-4">

    <div class="col-lg-5">
        <div class="card h-100">
            <div class="card-header">
                <span>
                    <i class="bi bi-lightning-charge-fill me-2"
                       style="color:var(--primary);"></i>
                    Quick Actions
                </span>
            </div>

            <div class="card-body">
                <p class="text-secondary mb-4">
                    Quickly access the main functions of your system.
                </p>

                <div class="d-grid gap-3">
                    <a href="{{ route('students.create') }}"
                       class="btn btn-primary">
                        <i class="bi bi-person-plus-fill me-2"></i>
                        Add New Student
                    </a>

                    <a href="{{ route('departments.create') }}"
                       class="btn btn-outline-primary">
                        <i class="bi bi-building-add me-2"></i>
                        Add New Department
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-7">
        <div class="card h-100">
            <div class="card-header">
                <span>
                    <i class="bi bi-clock-history me-2"
                       style="color:var(--primary);"></i>
                    Recently Added Students
                </span>

                <a href="{{ route('students.index') }}"
                   class="btn btn-sm btn-outline-primary">
                    View All
                </a>
            </div>

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Student</th>
                            <th>Department</th>
                            <th>Enrollment</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($recentStudents as $student)
                            <tr>
                                <td>
                                    <div class="fw-semibold">
                                        {{ $student->student_name }}
                                    </div>
                                    <small class="text-secondary">
                                        {{ $student->email }}
                                    </small>
                                </td>

                                <td>
                                    {{ $student->department->dept_name ?? 'N/A' }}
                                </td>

                                <td>
                                    {{ $student->enrollment_date
                                        ? $student->enrollment_date->format('d M Y')
                                        : 'N/A' }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center py-5">
                                    <i class="bi bi-people fs-2 d-block mb-2"
                                       style="color:#d6a3af;"></i>
                                    No students have been added yet.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@endsection
