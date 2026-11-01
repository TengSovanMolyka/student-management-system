@extends('layouts.app')
@section('title', 'Students')
@section('page-title', 'Students')
@section('content')

<div class="page-heading d-flex flex-wrap justify-content-between align-items-center gap-3">
    <div>
        <h2>Students</h2>
        <p>Manage student information, enrollment, and department records.</p>
    </div>

    <a href="{{ route('students.create') }}" class="btn btn-primary">
        <i class="bi bi-person-plus-fill me-2"></i>
        Add New Student
    </a>
</div>

<div class="card mb-4">
    <div class="card-body">

        <form method="GET" action="{{ route('students.index') }}">
            <div class="row g-3 align-items-end">

                <div class="col-md-7">
                    <label for="studentSearch" class="form-label">
                        Search Students
                    </label>

                    <div class="input-group">
                        <span class="input-group-text bg-white"
                              style="border-color:var(--border-color);">
                            <i class="bi bi-search"
                               style="color:var(--primary);"></i>
                        </span>

                        <input
                            type="text"
                            id="studentSearch"
                            name="search"
                            value="{{ request('search') }}"
                            class="form-control"
                            placeholder="Search by student name or email">
                    </div>
                </div>

                <div class="col-md-auto">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-search me-1"></i>
                        Search
                    </button>

                    @if(request()->filled('search'))
                        <a href="{{ route('students.index') }}"
                           class="btn btn-light border ms-1">
                            <i class="bi bi-x-circle me-1"></i>
                            Clear
                        </a>
                    @endif
                </div>

            </div>
        </form>

    </div>
</div>

<div class="card">

    <div class="card-header">
        <span>
            <i class="bi bi-people-fill me-2"
               style="color:var(--primary);"></i>
            Student Records
        </span>

        <span class="soft-badge">
            {{ $students->total() }} Students
        </span>
    </div>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Student ID</th>
                    <th>Student Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Department</th>
                    <th>Enrollment Date</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>

            <tbody>
                @forelse($students as $student)
                    <tr>
                        <td>
                            <span class="record-id">#{{ $student->id }}</span>
                        </td>

                        <td>
                            <div class="d-flex align-items-center gap-3">
                                <div class="user-avatar"
                                     style="width:39px;height:39px;">
                                    <i class="bi bi-person-fill"></i>
                                </div>

                                <span class="fw-semibold">
                                    {{ $student->student_name }}
                                </span>
                            </div>
                        </td>

                        <td>{{ $student->email }}</td>

                        <td>
                            @if($student->gender === 'Male')
                                <span class="soft-badge"
                                      style="color:#4265a5;background:#edf2ff;">
                                    <i class="bi bi-gender-male me-1"></i>
                                    Male
                                </span>
                            @elseif($student->gender === 'Female')
                                <span class="soft-badge"
                                      style="color:#b8325b;background:#fdebf2;">
                                    <i class="bi bi-gender-female me-1"></i>
                                    Female
                                </span>
                            @else
                                {{ $student->gender }}
                            @endif
                        </td>

                        <td>
                            {{ $student->department->dept_name ?? 'N/A' }}
                        </td>

                        <td>
                            {{ $student->enrollment_date
                                ? $student->enrollment_date->format('d M Y')
                                : 'N/A' }}
                        </td>

                        <td>
                            <div class="d-flex justify-content-center gap-2">

                                <a href="{{ route('students.edit', $student->id) }}"
                                   class="btn btn-warning btn-sm"
                                   title="Edit student">
                                    <i class="bi bi-pencil-square"></i>
                                </a>

                                <form
                                    action="{{ route('students.destroy', $student->id) }}"
                                    method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this student?')">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-danger btn-sm"
                                            title="Delete student">
                                        <i class="bi bi-trash3"></i>
                                    </button>
                                </form>

                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-5">
                            <i class="bi bi-person-exclamation fs-1 d-block mb-3"
                               style="color:#d9a4b0;"></i>

                            <h5 class="fw-bold">No Students Found</h5>

                            <p class="text-secondary mb-3">
                                No student records match your search.
                            </p>

                            <a href="{{ route('students.create') }}"
                               class="btn btn-primary">
                                <i class="bi bi-plus-circle me-2"></i>
                                Add Student
                            </a>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($students->hasPages())
        <div class="card-body border-top d-flex justify-content-end">
            {{ $students->withQueryString()->links() }}
        </div>
    @endif

</div>

@endsection
